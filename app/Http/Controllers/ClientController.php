<?php

namespace App\Http\Controllers;

use App\Actions\AddressUser\CreateAddressUser;
use App\Actions\Client\CreateClient;
use App\Actions\User\CreateUser;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Client::class);
    }

    public function store(ClientStoreRequest $request, CreateUser $userCreator, CreateClient $clientCreator, CreateAddressUser $addressUserCreator)
    {
        return DB::transaction(function () use ($request, $userCreator, $clientCreator, $addressUserCreator) {
            $user = $userCreator->handle(data: $request->safe()->toArray());
            $addressUserCreator->handle(user: $user, data: $request->safe()->toArray()['address']);
            $client = $clientCreator->handle(clientUser: $user, data: $request->safe()->toArray());
            return ClientResource::make($client->load(['user', 'user.addresses', 'user.preferredLanguage']));
        });
    }
}
