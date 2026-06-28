<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        // api: __DIR__ . '/../routes/api.php',       // Bug 2 Fix — if API needed
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \App\Http\Middleware\Role::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {    // Bug 1 Fix

        // HTTP exceptions (abort 403, 404, etc.) → JSON for API clients
        $exceptions->render(function (
            HttpException $e,
            \Illuminate\Http\Request $request
        ) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => $e->getMessage()
                        ?: SymfonyResponse::$statusTexts[$e->getStatusCode()]
                ], $e->getStatusCode());
            }
        });

        // Middleware misconfiguration → clean 500 instead of ugly crash
        $exceptions->render(function (
            \InvalidArgumentException $e,
            \Illuminate\Http\Request $request
        ) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Server configuration error.'], 500);
            }
            abort(500, $e->getMessage());
        });
    })->create();
