<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
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
        'long_description',
        'category_id',
        'active',
        'affiliate_monthly_price',
        'affiliate_annual_price',
        'retail_monthly_price',
        'retail_annual_price',
        'recurring',
        'qv',
        'cv',
        'pv',
        'qc',
        'ac',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'active' => 'boolean',
        'affiliate_monthly_price' => 'decimal:2',
        'affiliate_annual_price' => 'decimal:2',
        'retail_monthly_price' => 'decimal:2',
        'retail_annual_price' => 'decimal:2',
        'recurring' => 'boolean',
        'qv' => 'decimal:2',
        'cv' => 'decimal:2',
        'pv' => 'decimal:2',
        'qc' => 'decimal:2',
        'ac' => 'decimal:2',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
