<?php

namespace App\Http\Controllers;

use App\Models\Package;

class FrontendController extends Controller
{
    // Homepage
    public function index()
    {
        // ১. ডাটাবেস থেকে সব একটিভ প্যাকেজ নিয়ে আসা হলো
        $allPackages = Package::active()
            ->orderBy('price', 'asc')
            ->get();

        // ২. মোট প্যাকেজের সংখ্যা বের করা হলো (যেমন: ২৩)
        $totalCount = $allPackages->count();

        // ৩. ৩-কলামের গ্রিড মেলানোর জন্য কতটি প্যাকেজ বাদ দিতে হবে (২৩ % ৩ = ২)
        $remainder = $totalCount % 3;

        // ৪. ডাইনামিক লিমিট হিসাব করা হলো (২৩ - ২ = ২১)
        $dynamicLimit = $totalCount - $remainder;

        // ৫. কালেকশন থেকে ঠিক ততগুলো প্যাকেজই নেওয়া হলো যা ৩ দিয়ে পুরোপুরি বিভাজ্য
        $packages = $allPackages->take($dynamicLimit);

        return view('frontend.index', compact('packages'));
    }

    // পেজগুলো এখনো তৈরি না হওয়া পর্যন্ত placeholder view রিটার্ন করবে
    public function homeInternet()
    {
        return view('frontend.home_internet');
    }

    public function corporate()
    {
        $packages = Package::active()
            ->where('type', 'corporate')
            ->orderBy('price', 'asc')
            ->get();

        return view('frontend.corporate', compact('packages'));
    }

    public function coverage()
    {
        return view('frontend.coverage');
    }

    public function iptsp()
    {
        return view('frontend.iptsp');
    }

    public function hosting()
    {
        return view('frontend.hosting');
    }

    public function support()
    {
        return view('frontend.support');
    }

    public function order($id)
    {
        $package = Package::where('package_id', $id)
            ->active()
            ->firstOrFail();

        return view('frontend.order', compact('package'));
    }
}
