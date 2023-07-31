<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends User
{
    protected $table = 'users';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('super_admin', function ($query) {
            $query->where('role', RoleEnum::SUPER_ADMIN->value);
        });
    }

}
