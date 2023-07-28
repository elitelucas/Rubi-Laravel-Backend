<?php

namespace App\Traits;

use App\Models\Scopes\TenantScope;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

trait HasTenant
{
    protected static function booted(): void
    {
        static::creating(function (Model $model) {
            $model->tenant_id = Auth::guard('api')->user()->id;
        });

        static::addGlobalScope(new TenantScope());
    }
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }
}
