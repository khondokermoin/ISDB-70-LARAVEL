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
        // FIX 1: নেস্টেড impersonation আটকানো হচ্ছে।
        // ইতিমধ্যে impersonate mode-এ থাকলে (session-এ impersonator_id আছে মানে),
        // Auth::id() তখন আসল Super Admin না — তাই নতুন করে impersonator_id সেট করলে
        // আসল Super Admin এর আইডি চিরতরে হারিয়ে যাবে। তাই আগে leave করতে বাধ্য করা হচ্ছে।
        if (Session::has('impersonator_id')) {
            return redirect()->route('impersonate.leave')
                ->with('error', 'You are already impersonating a tenant. Please return to Super Admin first, then try again.');
        }

        $tenantAdmin = User::where('company_id', $company->id)
            ->role('Company Admin') // Spatie permission ব্যবহার করলে এই স্কোপ কাজ করবে
            ->first();

        if (! $tenantAdmin) {
            return back()->with('error', 'This company has no admin user to impersonate.');
        }

        // FIX 3: নিষ্ক্রিয়/সাসপেন্ড করা admin কে impersonate করতে দেওয়া হচ্ছে না।
        // আপনার User মডেলে যদি সাসপেন্ড/অ্যাক্টিভ ফ্ল্যাগের কলাম নাম আলাদা হয়
        // (যেমন is_active, status ইত্যাদি), সেটার নাম বসিয়ে দিন — এখানে ধরে নেওয়া হয়েছে
        // 'status' কলাম আছে এবং মান 'active' মানে অ্যাক্টিভ। কলাম না থাকলে এই ব্লক বাদ দিন।
        if (isset($tenantAdmin->status) && $tenantAdmin->status !== 'active') {
            return back()->with('error', 'This tenant admin account is inactive and cannot be impersonated.');
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

        if (! $impersonatorId) {
            // impersonate mode-এই ছিল না — চুপচাপ dashboard এ পাঠিয়ে দেওয়ার বদলে জানিয়ে দেওয়া হচ্ছে
            return redirect()->route('dashboard')
                ->with('error', 'You are not currently impersonating any tenant.');
        }

        $originalAdmin = User::find($impersonatorId);

        // FIX 2: original super admin আর না থাকলে (delete/disable) silent 403-loop
        // এড়ানো হচ্ছে — বরং সম্পূর্ণ লগআউট করে লগইন পেজে পাঠানো হচ্ছে।
        if (! $originalAdmin) {
            Auth::logout();
            Session::invalidate();
            Session::regenerateToken();

            return redirect()->route('login')
                ->with('error', 'Your original admin account could not be restored. Please log in again.');
        }

        Auth::login($originalAdmin);

        return redirect()->route('superadmin.dashboard')
            ->with('success', 'You have returned to your Super Admin account.');
    }
}