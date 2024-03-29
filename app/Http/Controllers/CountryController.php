<?php

namespace App\Http\Controllers;

use App\Actions\Country\ListAllCountries;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListAllCountries $listAllCountries): AnonymousResourceCollection
    {
        $countries = $listAllCountries->handle();

        return CountryResource::collection($countries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
