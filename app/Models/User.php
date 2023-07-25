<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'firstname',
        'lastname',
        'mobile',
        'email',
        'username',
        'role',
        'status',
        'password',
        'country_id',
        'phone_country_code',
        'created_by_user_id',
        '2fa_verified',
        'preferred_language_id',
        'date_of_birth',
        'ip_address',
        'tin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'date_of_birth' => 'date',
    ];

    /**
     * Attributes to append on resources
     *
     * @var string[]
     */
    protected $appends = ['name'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * Client relationship if the current user is a client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|null
     */
    public function client(): ?\Illuminate\Database\Eloquent\Relations\HasOne
    {
        if ($this->hasRole(RoleEnum::CLIENT_ADMIN->value)) {
            return $this->hasOne(Client::class);
        }

        return null;
    }

    /**
     * Customer relationship if the current user is a customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|null
     */
    public function customer(): ?\Illuminate\Database\Eloquent\Relations\HasOne
    {
        if ($this->hasRole(RoleEnum::CUSTOMER->value)) {
            return $this->hasOne(Customer::class);
        }

        return null;
    }

    /**
     * Self relationship - creator
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    /**
     * Full name accessor
     *
     * @return Attribute
     */
    public function name(): Attribute
    {
        return new Attribute(get: fn() => $this->firstname . ' ' . $this->lastname);
    }

    /**
     * Get the country that owns the User
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the addresses for the user.
     *
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(AddressUser::class);
    }

    public function preferredLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'preferred_language_id');
    }

    public function workspaces(): BelongsToMany
    {
        return $this->belongsToMany(Workspace::class);
    }

    public function invitations(): hasMany
    {
        return $this->hasMany(Invitation::class);
    }
}
