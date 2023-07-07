<?php

namespace App\Http\Controllers;

use App\Actions\Client\CreateClient;
use App\Actions\User\CreateUser;
use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function store(StoreClientRequest $request, CreateUser $userCreator, CreateClient $clientCreator) {

        return DB::transaction(function () use ($request, $userCreator, $clientCreator) {
            $user = $userCreator->handle(data: $request->safe()->toArray());
            $client = $clientCreator->handle(clientUser: $user, data: $request->safe()->toArray());
            return ClientResource::make($client);
        });
    }
}
