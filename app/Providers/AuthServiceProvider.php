<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot()
    {
        $this->registerPolicies();

        // Grant all permissions to the 'admin' role
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Admin')) {
                return true; // Admin can do everything
            }

            // Non-admin users get access to everything they have permission for
            if ($user->hasPermissionTo($ability)) {
                return true;
            }

            return null; // Let other gates handle non-admin permissions
        });
    }
}
