<?php

namespace App\Http\Controllers;

use App\Actions\ModuleComponents\CreateModuleComponent;
use App\Http\Requests\ModuleComponentRequest;
use App\Http\Resources\ModuleComponentResource;
use Illuminate\Http\Request;

class AdminModuleComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function store(ModuleComponentRequest $request, CreateModuleComponent $createModuleComponent): ModuleComponentResource
    {
        $moduleComponent = $createModuleComponent->handle($request->safe()->toArray());
        return ModuleComponentResource::make($moduleComponent);
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
