<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class IdentifyTenantByDomain
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();

        if (empty($host)) {
            abort(404, 'Tenant Not Found');
        }

        $company = Company::query()
            ->where(function ($query) use ($host) {
                $query->where('custom_domain', $host)
                    ->orWhere('subdomain', $this->normalizeDomainToken($host));
            })
            ->first();

        if (! $company) {
            abort(404, 'Tenant Not Found');
        }

        app()->instance('tenant', $company);

        Inertia::share('tenant', $company->only([
            'name',
            'logo',
            'favicon',
            'theme_settings',
            'contact_info',
        ]));

        return $next($request);
    }

    protected function normalizeDomainToken(string $host): string
    {
        $host = strtolower(trim($host));

        if (str_contains($host, '.')) {
            $host = explode('.', $host)[0];
        }

        return preg_replace('/[^a-z0-9_-]+/', '', $host) ?? $host;
    }
}
