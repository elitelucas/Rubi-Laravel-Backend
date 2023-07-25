<?php

namespace App\Http\Controllers;

use App\Actions\Persona\CreatePersona;
use App\Actions\Tone\CreateTone;
use App\Actions\Voice\CreateVoice;
use App\Http\Requests\PersonasStoreRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonasController extends Controller
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
    public function store(PersonasStoreRequest $request, CreatePersona $createpersona, CreateVoice $createVoice, CreateTone $createTone)
    {
        $personas = $this->getPersona($request->safe()->toArray()['prompt']);
        if (is_object($personas)) {
            $persona = $createpersona->handle($personas->personas);
            $voice = $createVoice->handle($personas->voice);
            $tone = $createTone->handle($personas->tone);
            return true;
        }
    }

    public function getPersona(string $prompt)
    {

        // $prompt = "You are distributor for [Company/Product] [Objective]. [Product focus] is the main product focus. You are looking to create a target audience where you will market your services. Create [Number of Audiences] personas that you will target and give detailed information about each audience and why you have chosen them. Name the persona. Include the hobbies and interests most likely to be reflected in these audience profiles. Include in the audience profile, Age range, gender, ethnicity if applicable, education level, family household structure, number of children living at home, income level, urban or rural area, interests and hobbies, values to the audience, media consumption, motivation to the audience, how they prefer to communicate and what strongly influences their decisions. Create 3 Voice and 3 Tone profiles. Shorten the voice and tone to just include the prompting descriptions. [Company/Product] RUBI AI [Objective] 1 Million Paid subscribers in 12 months [Product Focus] Leader in EXO AI content generation and Research data collection [Number of Audiences] 1";

        $assistant = config('openai.assistant');

        $client = new Client([
            'base_uri' => config('openai.base_url')
        ]);

        $message = [
            ["role" => "system", "content" => $assistant],
            ["role" => "user", "content" => $prompt]
        ];

        try {
            $response = $client->request('POST', 'v1/chat/completions', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . config('openai.open_api_key')
                ],
                'json' => [
                    'model' => config('openai.model'),
                    "messages" => $message,
                    'max_tokens' => config('openai.max_tokens'),
                    'temperature' => config('openai.temperature'),
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            $result = json_decode($data['choices'][0]['message']['content']);

            $persona = [
                'name' => $result->audiences[0]->name,
                'short_description' => $result->audiences[0]->description,
                'avatar' => $result->audiences[0]->name,
                'demographics' => $result->audiences[0]->educationLevel,
                'household_structure' => $result->audiences[0]->familyHouseholdStructure,
                'income_level' => $result->audiences[0]->incomeLevel,
                'location' => $result->audiences[0]->area,
                'communication_pref' => $result->audiences[0]->communicationPreference,
                'influences' => $result->audiences[0]->influences,
                'interest_hobbies' => $result->audiences[0]->interestsAndHobbies,
                'values' => $result->audiences[0]->values,
                'motivation' => $result->audiences[0]->motivation,
                'media_consumption' => $result->audiences[0]->mediaConsumption,
            ];

            $voice = $result->voice;
            $tone = $result->tone;

            return [
                'personas' => $persona,
                'voice' => $voice,
                'tone' => $tone
            ];

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            echo $e->getMessage();
        }
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