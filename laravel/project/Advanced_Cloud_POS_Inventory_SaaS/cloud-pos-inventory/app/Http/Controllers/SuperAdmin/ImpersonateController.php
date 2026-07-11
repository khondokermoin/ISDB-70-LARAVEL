<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company; // আপনার Company মডেলের সঠিক পাথ/নেম বসাবেন
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    /**
     * কোনো কোম্পানির ওনার হিসেবে লগইন (Impersonate) শুরু করা
     */
    public function impersonate($companyId)
    {
        // ১. কোম্পানিটি খুঁজে বের করা
        $company = Company::findOrFail($companyId);

        // ২. কোম্পানির ওনার বা অ্যাডমিনকে খুঁজে বের করা
        // (নোট: আপনার ডাটাবেসে রিলেশনশিপের নাম 'owner' না হয়ে 'user' বা অন্য কিছু হতে পারে)
        $owner = $company->owner;

        if (!$owner) {
            return back()->with('error', 'এই কোম্পানির কোনো ওনার পাওয়া যায়নি!');
        }

        // ✅ নতুন যুক্ত করা হয়েছে:
        // ওনারের যদি 'Company Admin' রোল না থাকে, তবে তাকে অ্যাসাইন করে দিন
        // (ধরে নেওয়া হচ্ছে আপনি Spatie Permission প্যাকেজ ব্যবহার করছেন)
        if (method_exists($owner, 'hasRole') && !$owner->hasRole('Company Admin')) {
            $owner->assignRole('Company Admin');
        }

        // ৩. বর্তমান সুপার অ্যাডমিনের আইডি সেশনে সেভ করা (পরে ফিরে আসার জন্য)
        session()->put('impersonator_id', Auth::id());
        session()->put('is_impersonating', true);

        // ৪. ওনার হিসেবে লগইন করা
        Auth::login($owner);

        // ৫. কোম্পানির ড্যাশবোর্ডে রিডাইরেক্ট করা
        return redirect()->route('company.dashboard')->with('success', 'আপনি এখন ' . $owner->name . ' হিসেবে লগইন করেছেন।');
    }

    /**
     * Impersonate বন্ধ করে আবার সুপার অ্যাডমিনে ফিরে আসা
     */
    public function stopImpersonate()
    {
        $impersonatorId = session('impersonator_id');

        if ($impersonatorId) {
            // আসল সুপার অ্যাডমিন হিসেবে আবার লগইন করা
            Auth::loginUsingId($impersonatorId);

            // সেশন থেকে ডাটা মুছে ফেলা
            session()->forget(['impersonator_id', 'is_impersonating']);

            return redirect()->route('superadmin.companies.index')->with('success', 'আপনি সফলভাবে সুপার অ্যাডমিনে ফিরে এসেছেন।');
        }

        return redirect()->route('superadmin.dashboard');
    }
}
