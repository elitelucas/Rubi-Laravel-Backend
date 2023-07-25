<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Invitation::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user, Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Invitation $invitation)
    {
        //
    }
}
