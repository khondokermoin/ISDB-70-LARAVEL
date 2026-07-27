<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Plan;
use App\Models\User;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies.
     */
    public function index()
    {
        // ✅ 'owner' রিলেশনশিপ ব্যবহার করা হয়েছে (আপনার মডেল অনুযায়ী)
        $companies = Company::with(['plan', 'owner', 'businessType'])
            ->withCount(['users', 'branches'])
            ->latest()
            ->get();

        $stats = [
            'total'     => $companies->count(),
            'active'    => $companies->where('status', 'active')->count(),
            'trial'     => $companies->where('status', 'trial')->count(),
            'suspended' => $companies->where('status', 'suspended')->count(),
        ];

        return view('super-admin.companies.index', compact('companies', 'stats'));
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        $plans          = Plan::where('status', 'active')->get();
        $users          = User::all();
        $business_types = BusinessType::where('is_active', true)->get();

        return view('super-admin.companies.create', compact('plans', 'users', 'business_types'));
    }

    /**
     * Store a newly created company in storage.
     */
    public function store(\App\Http\Requests\SuperAdmin\StoreCompanyRequest $request)
    {
        $validated = $request->validated();

        $uploadedPaths = [];

        if ($request->hasFile('logo')) {
            $uploadedPaths['logo'] = $request->file('logo')->store('companies/logos', 'public');
            $validated['logo'] = $uploadedPaths['logo'];
        }

        if ($request->hasFile('favicon')) {
            $uploadedPaths['favicon'] = $request->file('favicon')->store('companies/logos', 'public');
            $validated['favicon'] = $uploadedPaths['favicon'];
        }

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);
        }

        $themeSettings = [
            'primary_color' => $request->input('primary_color', '#2563eb'),
        ];

        $trialEndsAt = null;
        if ($validated['status'] === 'trial') {
            $plan = Plan::find($request->input('plan_id'));
            $trialDays = $plan ? ($plan->trial_days ?? 14) : 14;
            $trialEndsAt = now()->addDays($trialDays);
        }

        DB::beginTransaction();
        try {
            $company = Company::create([
                'name' => $validated['name'],
                'slug' => $validated['slug'] ?? null,
                'email' => $validated['email'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'contact_person' => $request->input('contact_person'),
                'website' => $request->input('website'),
                'address' => $validated['address'] ?? null,
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'zip_code' => $request->input('zip_code'),
                'logo' => $validated['logo'] ?? null,
                'favicon' => $validated['favicon'] ?? null,
                'theme_settings' => $themeSettings,
                'social_links' => $request->input('social_links', []),
                'contact_info' => $request->input('contact_info', []),
                'subdomain' => $validated['subdomain'],
                'custom_domain' => $validated['custom_domain'] ?? null,
                'currency' => $request->input('currency', 'BDT'),
                'timezone' => $request->input('timezone', 'Asia/Dhaka'),
                'settings' => $request->input('settings', []),
                'status' => $validated['status'],
                'trial_ends_at' => $trialEndsAt,
                'plan_id' => $request->input('plan_id'),
                'business_type_id' => $request->input('business_type_id'),
            ]);

            // Handle Company Admin Assignment
            // Priority: 1. New admin creation, 2. Existing user selection
            $user = null;
            
            $adminName = $request->input('admin_name');
            $adminEmail = $request->input('admin_email');
            $adminPassword = $request->input('admin_password');
            $existingUserId = $request->input('user_id');

            // Create new admin if provided
            if (! empty($adminName) && ! empty($adminEmail) && ! empty($adminPassword)) {
                $user = User::create([
                    'name' => $adminName,
                    'email' => $adminEmail,
                    'password' => \Illuminate\Support\Facades\Hash::make($adminPassword),
                    'company_id' => $company->id,
                ]);
            } 
            // Use existing user if selected and no new admin is being created
            elseif (! empty($existingUserId)) {
                $user = User::find($existingUserId);
                if ($user) {
                    // Update company_id if needed
                    $user->update(['company_id' => $company->id]);
                }
            }

            // Assign Company Admin role if user exists and has the method
            if ($user && method_exists($user, 'assignRole')) {
                $user->assignRole('Company Admin');
            }

            DB::commit();

            return redirect()->route('superadmin.companies.index')
                ->with('success', 'Company and admin user created successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();

            foreach ($uploadedPaths as $path) {
                if (! empty($path) && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }

            return back()->withInput()->with('error', 'Something went wrong while creating the company. Please try again.');
        }
    }

    /**
     * Display the specified company.
     */
    public function show($id)
    {
        $company = Company::with(['plan', 'owner', 'businessType'])
            ->withCount(['users', 'branches'])
            ->findOrFail($id);

        return view('super-admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit($id)
    {
        $company        = Company::findOrFail($id);
        $plans          = Plan::where('status', 'active')->get();
        $users          = User::all();
        $business_types = BusinessType::where('is_active', true)->get();

        return view('super-admin.companies.edit', compact('company', 'plans', 'users', 'business_types'));
    }

    /**
     * Update the specified company in storage.
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'slug'             => 'nullable|string|unique:companies,slug,' . $company->id,
            'email'            => 'required|email|unique:companies,email,' . $company->id,
            'contact_person'   => 'nullable|string|max:255',
            'phone'            => 'nullable|string|max:50',
            'website'          => 'nullable|url|max:255',
            'address'          => 'nullable|string',
            'city'             => 'nullable|string|max:100',
            'country'          => 'nullable|string|max:100',
            'zip_code'         => 'nullable|string|max:20',
            'subdomain'        => 'nullable|string|unique:companies,subdomain,' . $company->id,
            'custom_domain'    => 'nullable|string|unique:companies,custom_domain,' . $company->id,
            'currency'         => 'nullable|string|max:10',
            'timezone'         => 'nullable|string|max:50',
            'status'           => 'required|in:active,inactive,suspended,trial',
            'plan_id'          => 'required|exists:plans,id',
            'user_id'          => 'required|exists:users,id',
            'business_type_id' => 'required|exists:business_types,id',
            'logo'             => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'settings'         => 'nullable|array',
            'trial_ends_at'    => 'nullable|date', // ✅ Expired স্ট্যাটাস ফিক্স করার জন্য
        ]);

        // লোগো আপলোড হ্যান্ডলিং
        if ($request->hasFile('logo')) {
            if ($company->logo && Storage::disk('public')->exists($company->logo)) {
                Storage::disk('public')->delete($company->logo);
            }
            $validated['logo'] = $request->file('logo')->store('companies/logos', 'public');
        } else {
            // নতুন লোগো না থাকলে পুরনোটা মুছে যাবে না তাই এটি আনসেট করা হলো
            unset($validated['logo']);
        }

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);
        }

        // Trial Ends At logic
        $trialEndsAt = $request->filled('trial_ends_at') ? $request->trial_ends_at : $company->trial_ends_at;
        
        if ($validated['status'] === 'trial' && empty($trialEndsAt)) {
            $plan = Plan::find($validated['plan_id']);
            $trialDays = $plan ? ($plan->trial_days ?? 14) : 14;
            $trialEndsAt = now()->addDays($trialDays);
        }

        // Store old user_id to unassign role if it changes
        $oldUserId = $company->user_id;
        $newUserId = $validated['user_id'];

        // ✅ Database Update (Model Cast automatically handles settings array)
        $company->update([
            'name'             => $validated['name'],
            'slug'             => $validated['slug'],
            'email'            => $validated['email'],
            'contact_person'   => $validated['contact_person'] ?? null,
            'phone'            => $validated['phone'] ?? null,
            'website'          => $validated['website'] ?? null,
            'address'          => $validated['address'] ?? null,
            'city'             => $validated['city'] ?? null,
            'country'          => $validated['country'] ?? null,
            'zip_code'         => $validated['zip_code'] ?? null,
            'subdomain'        => $validated['subdomain'] ?? null,
            'custom_domain'    => $validated['custom_domain'] ?? null,
            'currency'         => $validated['currency'] ?? 'BDT',
            'timezone'         => $validated['timezone'] ?? 'Asia/Dhaka',
            'status'           => $validated['status'],
            'plan_id'          => $validated['plan_id'],
            'user_id'          => $newUserId, // ✅ Correct column name
            'business_type_id' => $validated['business_type_id'],
            'trial_ends_at'    => $trialEndsAt,          // ✅ Being updated
            'settings'         => $request->has('settings') ? $request->settings : $company->settings,
        ]);

        // Handle role assignment when user changes
        if ($oldUserId !== $newUserId) {
            // Remove role from old user if exists
            if (! empty($oldUserId)) {
                $oldUser = User::find($oldUserId);
                if ($oldUser && method_exists($oldUser, 'removeRole')) {
                    $oldUser->removeRole('Company Admin');
                }
            }

            // Assign role to new user
            $newUser = User::find($newUserId);
            if ($newUser && method_exists($newUser, 'assignRole')) {
                $newUser->assignRole('Company Admin');
            }
        }

        if ($request->wantsJson()) {
            return response()->json([
                'message'  => 'Company updated successfully!',
                'redirect' => route('superadmin.companies.index')
            ]);
        }

        return redirect()->route('superadmin.companies.index')
            ->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified company from storage.
     */
    public function destroy(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        if ($company->logo && Storage::disk('public')->exists($company->logo)) {
            Storage::disk('public')->delete($company->logo);
        }

        $company->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message'  => 'Company deleted successfully!',
                'redirect' => route('superadmin.companies.index')
            ]);
        }

        return redirect()->route('superadmin.companies.index')
            ->with('success', 'Company deleted successfully!');
    }
}