<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_type_id',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal_code',
        'country_id',
        'archived'
    ];

    /*
     * Get the user that owns the AddressUser
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
     * Get the addressType that owns the AddressUser
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addressType()
    {
        return $this->belongsTo(AddressType::class);
    }

    /**
     * Get the country that owns the AddressUser
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }


}
