<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // যদি ইউজার লগিন করা না থাকে, অথবা ইউজারের রোল রিকোয়েস্ট করা রোলের সাথে না মিলে, 
        // তাহলে তাকে সাধারণ ড্যাশবোর্ডে রিডাইরেক্ট করে দেওয়া হবে।
        if ($request->user()->role !== $role) {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
