<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard()->check()) {
            return redirect('/login');
        }
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            $namaRole = Role::find(Auth::guard($guard)->user()->role_id)->nama_role;
            if ($namaRole == 'pengunjung') {
                return redirect('/');
            }

        }
        return $next($request);
    }
}
