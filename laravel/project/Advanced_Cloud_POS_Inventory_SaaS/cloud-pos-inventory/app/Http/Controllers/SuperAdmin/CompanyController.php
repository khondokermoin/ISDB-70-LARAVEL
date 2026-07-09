<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // সব কোম্পানির লিস্ট দেখানো
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('super-admin.companies.index', compact('companies'));
    }

    // কোম্পানি তৈরির ফর্ম দেখানো
    public function create()
    {
        return view('super-admin.companies.create');
    }

    // নতুন কোম্পানি সেভ করা
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Company::create($request->all());

        return redirect()->route('superadmin.companies.index')->with('success', 'Company created successfully!');
    }

    // কোম্পানির ডিটেইলস দেখা
    public function show(Company $company)
    {
        return view('super-admin.companies.show', compact('company'));
    }

    // কোম্পানি এডিট করার ফর্ম দেখানো
    public function edit(Company $company)
    {
        return view('super-admin.companies.edit', compact('company'));
    }

    // কোম্পানি আপডেট করা
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $company->update($request->all());

        return redirect()->route('superadmin.companies.index')->with('success', 'Company updated successfully!');
    }

    // কোম্পানি ডিলিট করা
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('superadmin.companies.index')->with('success', 'Company deleted successfully!');
    }
}