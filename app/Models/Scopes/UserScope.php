<?php

namespace App\Models\Scopes;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class UserScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::guard('api')->check()) {
            /** @var User $user */
            $user = Auth::guard('api')->user();
            if (!$user->hasRole(roles: RoleEnum::SUPER_ADMIN->value)) {
                $builder->where('user_id', Auth::user()->id);
            }
        }
    }
}
