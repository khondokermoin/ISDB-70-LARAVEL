<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        // Spatie Middleware Aliases
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);

        // Guest Redirect Logic (SaaS Roles)
        $middleware->redirectUsersTo(function (Request $request) {
            
            $user = $request->user();

            if ($user) {
                if ($user->hasRole('Super Admin')) {
                    return route('superadmin.dashboard');
                } elseif ($user->hasRole('Company Admin')) {
                    return route('company.dashboard');
                } elseif ($user->hasRole('Branch Manager') || $user->hasRole('Cashier')) {
                    return route('branch.dashboard');
                }
            }

            return route('dashboard'); // Fallback
        });
        
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();