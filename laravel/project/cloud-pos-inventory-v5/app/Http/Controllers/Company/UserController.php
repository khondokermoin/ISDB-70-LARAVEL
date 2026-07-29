<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of all staff users for this company.
     */
    public function index()
    {
        $companyId = Auth::user()->company_id;

        $users = User::where('company_id', $companyId)
            ->with(['roles', 'branch'])
            ->latest()
            ->paginate(15);

        $branches = Branch::where('company_id', $companyId)->get();

        return view('company.users.index', compact('users', 'branches'));
    }

    public function create()
    {
        // বর্তমান কোম্পানির সব ব্রাঞ্চ লোড করা
        $branches = Branch::where('company_id', auth()->user()->company_id)->get();

        return view('company.users.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|string',
            'branch_id' => 'nullable|exists:branches,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_id' => auth()->user()->company_id, // ✅ অটোমেটিক বর্তমান কোম্পানির আইডি
            'branch_id' => $request->branch_id,         // ✅ UI থেকে সিলেক্ট করা ব্রাঞ্চ আইডি
        ]);

        // Spatie Permission ব্যবহার করলে রোল অ্যাসাইন
        $user->assignRole($request->role);

        return redirect()->route('company.users.index')
            ->with('success', 'User created and assigned to branch successfully!');
    }

    /**
     * Assign or change a user's role.
     */
    public function assignRole(Request $request, User $user)
    {
        // Security: only allow managing users within the same company
        if ($user->company_id !== Auth::user()->company_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'role' => 'required|string',
        ]);

        $user->syncRoles([$request->role]);

        return redirect()->back()->with('success', 'Role updated for ' . $user->name . ' successfully.');
    }

    /**
     * Remove the specified user from the company.
     */
    public function destroy(User $user)
    {
        if ($user->company_id !== Auth::user()->company_id) {
            abort(403, 'Unauthorized action.');
        }

        // Prevent self-deletion
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('company.users.index')->with('success', 'User removed successfully.');
    }
}
