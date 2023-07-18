<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // If user is super-admin, bypass all permission checks
        Gate::before(function (User $user, string $ability) {
            if ($user->hasRole(RoleEnum::SUPER_ADMIN->value)) {
                return true;
            }
        });
    }
}
