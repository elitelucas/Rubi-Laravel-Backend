<?php

namespace App\Http\Controllers;

use App\Actions\User\UpdateUser;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(UserUpdateRequest $request, User $user, UpdateUser $userUpdater): UserResource
    {
        $updatedUser = $userUpdater->handle($user, $request->safe()->toArray());
        return UserResource::make($updatedUser);
    }

    /**
     * Display the specified user.
     */
    public function show(User $user): UserResource
    {
        return UserResource::make($user);
    }
}
