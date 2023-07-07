<?php

namespace App\Actions\Customer;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreateCustomer
{
    /**
     * Creates a customer.
     * The User model for the customer must be created before.
     *
     * @param User $customerUser
     * @param array $data
     * @return Model
     */
    public function handle(User $customerUser, array $data): Model
    {
        // Assign the role
        $customerUser->assignRole(RoleEnum::CUSTOMER->value);
        // Create the customer
        return $customerUser->customer()->create($data);
    }
}
