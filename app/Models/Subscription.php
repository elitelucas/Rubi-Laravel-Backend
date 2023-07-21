<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'created_by_user_id',
        'affiliate_price_monthly',
        'retail_price_monthly',
        'affiliate_annual',
        'retail_annual',
        'workspaces',
        'collaborators',
        'words',
        'credits',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'created_by_user_id' => 'integer',
        'affiliate_price_monthly' => 'decimal:2',
        'retail_price_monthly' => 'decimal:2',
        'affiliate_annual' => 'decimal:2',
        'retail_annual' => 'decimal:2',
        'workspaces' => 'integer',
        'collaborators' => 'integer',
        'words' => 'integer',
        'credits' => 'integer',
    ];

    public function subscriptionCollections(): HasMany
    {
        return $this->hasMany(SubscriptionCollection::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
