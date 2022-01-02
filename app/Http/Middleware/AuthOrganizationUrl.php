<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AuthOrganizationUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $account = $request->route('account');
        $setting = Setting::where('domain_name', $account)->firstOrFail();
        URL::defaults(['account' => $account]);

        // Organization::find();
        // dd($setting);
        
        return $next($request);
    }
}
