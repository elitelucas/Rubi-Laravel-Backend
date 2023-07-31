<?php

namespace App\Actions\UserSubscription;

use App\Enums\RoleEnum;
use App\Models\User;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use InvalidArgumentException;
use Throwable;

class CreateUserSubscription
{
    /**
     * @throws Throwable
     */
    public function handle(User $currentUser, array $data): Model|Builder|UserSubscription
    {
        // Business rules
        CheckUserSubscription::handle(currentUser: $currentUser, data: $data);
        // Any rules passed
        return UserSubscription::query()->create(array_merge($data, [
            'activated_at' => now(),
            'renewal_at' => Carbon::parse($data['expiration_at'])->addDay()
        ]))->refresh();
    }
}
