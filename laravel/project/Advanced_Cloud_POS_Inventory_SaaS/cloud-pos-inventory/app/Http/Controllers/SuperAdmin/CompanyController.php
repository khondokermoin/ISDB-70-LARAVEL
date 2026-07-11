<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    // সব কোম্পানির লিস্ট দেখানো
    public function index()
    {
        // ১. সব কোম্পানি আনা (DataTables client-side এর জন্য)
        $companies = Company::with(['plan', 'owner'])
            ->withCount(['users', 'branches'])
            ->latest()
            ->get();

        // ২. Stats Cards এর জন্য count আলাদা করা
        $stats = [
            'total' => $companies->count(),
            'active' => $companies->where('status', 'active')->count(),
            'trial' => $companies->where('status', 'trial')->count(),
            'suspended' => $companies->where('status', 'suspended')->count(),
        ];

        return view('super-admin.companies.index', compact('companies', 'stats'));
    }

    // কোম্পানি তৈরির ফর্ম দেখানো
    public function create()
    {
        $plans = Plan::where('status', 'active')->get();
        $users = User::all(); // কোম্পানির অ্যাডমিন অ্যাসাইন করার জন্য
        return view('super-admin.companies.create', compact('plans', 'users'));
    }

    // নতুন কোম্পানি সেভ করা
    public function store(Request $request)
    {
        // ১. কমপ্লিট ভ্যালিডেশন
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:companies,slug',
            'email' => 'required|email|unique:companies,email',
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|url|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'subdomain' => 'nullable|string|unique:companies,subdomain',
            'custom_domain' => 'nullable|string|unique:companies,custom_domain',
            'currency' => 'nullable|string|max:10',
            'timezone' => 'nullable|string|max:50',
            'status' => 'required|in:active,inactive,suspended,trial',
            'plan_id' => 'required|exists:plans,id',
            'user_id' => 'required|exists:users,id', // কোম্পানির অ্যাডমিন ইউজার
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // ২. লোগো আপলোড হ্যান্ডলিং
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('companies/logos', 'public');
        }

        // ৩. Slug অটো-জেনারেট (যদি ফর্মে খালি থাকে)
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);
        }

        // ৪. ডাটাবেসে সেভ করা
        Company::create($validated);

        return redirect()->route('superadmin.companies.index')
            ->with('success', 'Company created successfully!');
    }

    // কোম্পানির ডিটেইলস দেখা
    public function show(Company $company)
    {
        // শো পেজে রিলেশনশিপ ডাটার জন্য লোড করা
        $company->load('plan', 'admin', 'branches');
        return view('super-admin.companies.show', compact('company'));
    }

    // কোম্পানি এডিট করার ফর্ম দেখানো
    public function edit(Company $company)
    {
        $plans = Plan::where('status', 'active')->get();
        $users = User::all();
        return view('super-admin.companies.edit', compact('company', 'plans', 'users'));
    }

    // কোম্পানি আপডেট করা
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:companies,slug,' . $company->id,
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|url|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'subdomain' => 'nullable|string|unique:companies,subdomain,' . $company->id,
            'custom_domain' => 'nullable|string|unique:companies,custom_domain,' . $company->id,
            'currency' => 'nullable|string|max:10',
            'timezone' => 'nullable|string|max:50',
            'status' => 'required|in:active,inactive,suspended,trial',
            'plan_id' => 'required|exists:plans,id',
            'user_id' => 'required|exists:users,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // নতুন লোগো আপলোড হলে পুরনোটি ডিলিট করা
        if ($request->hasFile('logo')) {
            if ($company->logo && Storage::disk('public')->exists($company->logo)) {
                Storage::disk('public')->delete($company->logo);
            }
            $validated['logo'] = $request->file('logo')->store('companies/logos', 'public');
        }

        // Slug অটো-জেনারেট
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);
        }

        $company->update($validated);

        return redirect()->route('superadmin.companies.index')->with('success', 'Company updated successfully!');
    }

    // কোম্পানি ডিলিট করা (Soft Delete)
    public function destroy(Company $company)
    {
        // ডিলিটের আগে লোগো ফাইলটি সার্ভার থেকে মুছে ফেলা
        if ($company->logo && Storage::disk('public')->exists($company->logo)) {
            Storage::disk('public')->delete($company->logo);
        }

        $company->delete(); // SoftDeletes ব্যবহারের কারণে এটি শুধু deleted_at ফিল্ড আপডেট করবে

        return redirect()->route('superadmin.companies.index')->with('success', 'Company deleted successfully!');
    }
}
