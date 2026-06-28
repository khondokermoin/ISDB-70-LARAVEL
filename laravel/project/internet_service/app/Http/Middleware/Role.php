<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Bug 2: Guard against misconfigured middleware
        if (empty($roles)) {
            throw new \InvalidArgumentException(
                'Role middleware requires at least one role. Usage: role:admin,staff'
            );
        }

        // 1. Auth check
        if (!Auth::check()) {
            return $request->expectsJson()
                ? response()->json(['message' => 'Unauthenticated.'], 401)
                : redirect()->route('login');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 5. Null role check
        if (is_null($user->role)) {
            Log::warning('User without role accessed the system', ['user_id' => $user->id]);
            abort(403, 'আপনার অ্যাকাউন্টে কোনো রোল এসাইন করা নেই।');
        }

        // 1+3: Strict & case-insensitive comparison with safe cast
        $userRole     = strtolower((string) $user->role);
        $allowedRoles = array_map('strtolower', $roles);

        if (!in_array($userRole, $allowedRoles, true)) {
            // 6. Audit log
            Log::warning('Unauthorized access attempt', [
                'user_id'       => $user->id,
                'attempted_role' => $userRole,
                'required_roles' => $allowedRoles,
                'url'           => $request->fullUrl(),
                'ip'            => $request->ip(),
            ]);

            // Bug 4: No abort() in ternary
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Forbidden.'], 403);
            }

            abort(403, 'এই পেজে আপনার অ্যাক্সেস নেই।');
        }

        return $next($request);
    }
}
