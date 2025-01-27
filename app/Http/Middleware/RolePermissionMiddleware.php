<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RolePermissionMiddleware
{
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        if (!$request->user()->hasRole($role)) {
            abort(403, 'Access denied');
        }

        if ($permission !== null && !$request->user()->can($permission)) {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
