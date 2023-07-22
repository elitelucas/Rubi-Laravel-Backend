<?php

namespace App\Http\Controllers;

use App\Actions\BoostInput\CreateBoostInput;
use App\Http\Requests\BoostInputStoreRequest;
use App\Http\Resources\BoostInputResource;
use Illuminate\Http\Request;

class BoostInputStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BoostInputStoreRequest $request, CreateBoostInput $createBoostInput):BoostInputResource
    {
        $boostInput = $createBoostInput->handle($request->safe()->toArray());
        return BoostInputResource::make($boostInput);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
