<?php

namespace App\Http\Controllers;

use App\Models\Package;

class FrontendController extends Controller
{
    // Homepage
    public function index()
    {
        $packages = Package::active()
            ->orderBy('price', 'asc')
            ->limit(6)
            ->get();

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
