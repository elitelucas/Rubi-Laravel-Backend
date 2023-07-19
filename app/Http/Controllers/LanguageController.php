<?php

namespace App\Http\Controllers;

use App\Actions\Language\ListAllLanguages;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListAllLanguages $listAllLanguages): AnonymousResourceCollection
    {
        $languages = $listAllLanguages->handle();

        return LanguageResource::collection($languages);
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
    public function show(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        //
    }
}
