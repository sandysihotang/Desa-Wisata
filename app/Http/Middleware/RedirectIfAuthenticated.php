<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $namaRole = Role::find(Auth::guard($guard)->user()->role_id)->nama_role;
                if ($namaRole == 'pengunjung') {
                    return redirect('/');
                }else if($namaRole == 'admin') {
                    return redirect('/home-admin');
                }
            }
        }

        return $next($request);
    }
}
