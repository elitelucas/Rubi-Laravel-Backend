<?php

namespace App\Http\Controllers;

use App\Actions\Customer\CreateCustomer;
use App\Actions\User\CreateUser;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    public function store(StoreCustomerRequest $request, CreateUser $userCreator, CreateCustomer $customerCreator)
    {
        return DB::transaction(function () use ($request, $userCreator, $customerCreator) {
            $user = $userCreator->handle(data: $request->safe()->toArray());
            $client = $customerCreator->handle(customerUser: $user, data: $request->safe()->toArray());
            return CustomerResource::make($client);
        });
    }
}
