<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    // ১. সব প্যাকেজের লিস্ট দেখানো
    public function index()
    {
        $packages = Package::orderBy('package_id', 'desc')->get();
        return view('admin.packages.index', compact('packages'));
    }

    // ২. নতুন প্যাকেজ তৈরি করার ফর্ম দেখানো
    public function create()
    {
        return view('admin.packages.create');
    }

    // ৩. ডাটাবেসে নতুন প্যাকেজ সেভ করা
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'type'          => 'required|in:home,corporate',
            'speed_mbps'    => 'required|numeric',
            'quota_gb'      => 'nullable|numeric',
            'price'         => 'required|numeric',
            'duration_days' => 'required|numeric',
            'status'        => 'required|in:active,inactive',
        ]);

        Package::create($request->all());

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully!');
    }

    // ৪. প্যাকেজ এডিট করার ফর্ম দেখানো
    public function edit($id)
    {
        // যেহেতু primaryKey 'package_id', তাই findOrFail ব্যবহার করা হলো
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    // ৫. ডাটাবেসে প্যাকেজ আপডেট করা
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'type'          => 'required|in:home,corporate',
            'speed_mbps'    => 'required|numeric',
            'quota_gb'      => 'nullable|numeric',
            'price'         => 'required|numeric',
            'duration_days' => 'required|numeric',
            'status'        => 'required|in:active,inactive',
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->all());

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully!');
    }

    // ৬. প্যাকেজ ডিলিট করা
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully!');
    }
}