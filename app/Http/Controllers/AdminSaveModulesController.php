<?php

namespace App\Http\Controllers;

use App\Actions\Modules\CreateModules;
use App\Actions\Modules\UpdateModule;
use App\Http\Requests\ModuleStoreRequest;
use App\Http\Requests\ModuleUpdateRequest;
use App\Http\Resources\ModuleResource;
use App\Models\Module;
use Illuminate\Http\Request;

class AdminSaveModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModuleStoreRequest $request, CreateModules $createModules) : ModuleResource
    {
        //
        $modules = $createModules->handle($request->safe()->toArray());
        return ModuleResource::make($modules);
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
    public function update(ModuleUpdateRequest $request, Module $modules, UpdateModule $moduleUpdater):ModuleResource
    {
        $updatedModule = $moduleUpdater->handle(module: $modules, data: $request->safe()->toArray());
        return ModuleResource::make($updatedModule);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
