<?php

namespace App\Http\Controllers;

use App\Actions\AddressUser\CreateAddressUser;
use App\Actions\SuperAdmin\CreateSuperAdmin;
use App\Actions\User\CreateUser;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        // Authorize the resource
        $this->authorizeResource(SuperAdmin::class);
    }
    public function store(UserStoreRequest $request, CreateUser $userCreator, CreateAddressUser $addressUserCreator, CreateSuperAdmin $superAdminCreator)
    {
        return DB::transaction(function () use ($request, $userCreator, $addressUserCreator, $superAdminCreator) {
            $user = $userCreator->handle(data: $request->safe()->toArray());
            $addressUserCreator->handle(user: $user, data: $request->safe()->toArray()['address']);
            $superAdmin = $superAdminCreator->handle(superAdmin: $user);
            return UserResource::make($superAdmin->load(['addresses', 'preferredLanguage']));
        });
    }
}
