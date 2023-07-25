<?php

namespace App\Http\Controllers;

use App\Actions\Boost\CreateBoost;
use App\Http\Requests\BoostStoreRequest;
use App\Http\Resources\BoostResource;
use App\Models\Boost;
use Illuminate\Http\Request;

class AdminBoostController extends Controller
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
    public function store(BoostStoreRequest $request, CreateBoost $createBoost):BoostResource
    {
        //
        $boost = $createBoost->handle($request->safe()->toArray());
        return BoostResource::make($boost);
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
