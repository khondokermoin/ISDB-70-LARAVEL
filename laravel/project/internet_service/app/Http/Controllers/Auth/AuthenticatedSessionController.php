<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Issue 4 Fix — resolve user once
        $user = $request->user();

        // Bug 1 Fix — case-insensitive comparison
        $role = strtolower((string) $user->role);

        // Issue 5 Fix — audit log on successful login
        Log::info('User logged in', [
            'user_id' => $user->id,
            'role'    => $role,
            'ip'      => $request->ip(),
        ]);

        // Bug 2 Fix — named routes; Bug 3 Fix — explicit match, no silent fallthrough
        $url = match ($role) {
            'admin'    => route('admin.dashboard'),
            'staff'    => route('staff.dashboard'),
            'customer' => route('dashboard'),
            default    => null,
        };

        if ($url === null) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            abort(403, 'আপনার অ্যাকাউন্টে কোনো বৈধ রোল নেই।');
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Issue 5 Fix — audit log on logout
        Log::info('User logged out', [
            'user_id' => Auth::id(),
            'ip'      => $request->ip(),
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
