<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ImpersonateController extends Controller
{
    // Tenants (companies) লিস্ট দেখায় — কোনটাতে impersonate করবেন বেছে নেওয়ার জন্য
    public function index()
    {
        $companies = Company::latest()->paginate(20);

        return view('super-admin.tenants.index', compact('companies'));
    }

    // নির্দিষ্ট company এর admin ইউজার হিসেবে লগইন করে দেখায়
    public function impersonate(Company $company)
    {
        $tenantAdmin = User::where('company_id', $company->id)
            ->role('Company Admin') // Spatie permission ব্যবহার করলে এই স্কোপ কাজ করবে
            ->first();

        if (! $tenantAdmin) {
            return back()->with('error', 'This company has no admin user to impersonate.');
        }

        // আসল Super Admin কে মনে রাখা হচ্ছে, যাতে পরে ফিরে আসা যায়
        Session::put('impersonator_id', Auth::id());

        Auth::login($tenantAdmin);

        return redirect()->route('company.dashboard')
            ->with('success', 'You are now viewing as ' . $tenantAdmin->name);
    }

    // impersonation থেকে বেরিয়ে আসল super admin এ ফিরে যাওয়ার মেথড
    public function leave()
    {
        $impersonatorId = Session::pull('impersonator_id');

        if ($impersonatorId) {
            Auth::loginUsingId($impersonatorId);
        }

        return redirect()->route('superadmin.dashboard');
    }
}