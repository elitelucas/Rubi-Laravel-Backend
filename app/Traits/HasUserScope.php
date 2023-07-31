<?php

namespace App\Traits;

use App\Models\Scopes\TenantScope;
use App\Models\Scopes\UserScope;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

trait HasUserScope
{
    protected static function booted(): void
    {
        static::addGlobalScope(new UserScope());
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
