<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$guard = 'admin')
    {
        if ( Auth::guard($guard)->check() ) {
            view()->share('modules',$this->adminModules());
            return $next($request);
        }

        return redirect(config('app.admin_login_url'));
    }

    public function adminModules()
	{
		$role = Auth::guard('admin')->user()->role_id;
		$module_ids= DB::table('role_modules')->where('role_id',$role)->pluck('module_id')->toArray();
		$modules = DB::table('modules')->whereIn('id',$module_ids)->orderby('module_order','asc')->get();
		return $modules;
	}
}
