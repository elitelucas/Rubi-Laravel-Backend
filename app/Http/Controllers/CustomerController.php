<?php

namespace App\Http\Controllers;

use App\Actions\AddressUser\CreateAddressUser;
use App\Actions\Customer\CreateCustomer;
use App\Actions\User\CreateUser;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Resources\CustomerResource;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function store(CustomerStoreRequest $request, CreateUser $userCreator, CreateCustomer $customerCreator, CreateAddressUser $addressUserCreator)
    {
        return DB::transaction(function () use ($request, $userCreator, $customerCreator, $addressUserCreator) {
            $user = $userCreator->handle(data: $request->safe()->toArray());
            $client = $customerCreator->handle(customerUser: $user, data: $request->safe()->toArray());
            $addressUserCreator->handle(user: $user, data: $request->safe()->toArray());
            return CustomerResource::make($client);
        });
    }
}
