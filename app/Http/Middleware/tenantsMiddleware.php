<?php

namespace App\Http\Middleware;

use App\Facade\Tenants;
use App\Models\Tenant;
use App\Service\TenantService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class tenantsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $tenant = Tenant::where('domain',$host)->first();
        Tenants::switchToTenant($tenant);
        //TenantService::switchToTenant($tenant);
        return $next($request);
    }
}
