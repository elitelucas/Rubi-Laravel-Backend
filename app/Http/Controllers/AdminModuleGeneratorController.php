<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminModuleGeneratorController extends Controller
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
    public function store(Request $request)
    {
        //
        $prompt = $request->input('prompt');
        $voice = $request->input('voice');
        $tone = $request->input('tone');
        $language = $request->input('language');
        $persona = $request->input('persona');

        $prompt = 'The listing should be well-written and enticing, highlighting the unique aspects of the property to attract potential buyers.\n'.$prompt;
        
        // $prompt = "The listing should be well-written and enticing, highlighting the unique aspects of the property to attract potential buyers.
        // Type of Listing: Rent - Lease - Sale
        // Type of Property:  Single-family, Condo, Townhouse, etc
        // 3. Features of the Property: sparkling swimming pool, relaxing hot tub, ideal for entertaining family and friends, a chef's delight, boasting high-end appliances, ample counter space, and stylish finishes.
        // 4. Living Space Size (in square feet): 3200 square feet
        // 5. Lot Size (in square feet): Half an acre Bathrooms
        // 6. Number of Bathrooms: 2 full bathrooms
        // 7. Number of Half Bathrooms: 2 half bathrooms Bedrooms
        // 8. Number of Bedrooms: 4 spacious bedrooms
        // 9. Asking Price: $500,000
        // 10. Annual Property Tax: $4,500
        // Special Description: Nestled by a serene lake, this property offers breathtaking views of early morning sunrises and tranquil surroundings. Explore the nearby hiking trails and embrace the beauty of nature.";

        // $voice = "descriptive";
        // $tone = "persuasive";
        // $language = "us";
        // $persona = 'Audience';

        $assistant = "You are a kindly assistant.";

        $system_prompt = " Give me good write with descriptive ".$voice." and tone of ".$tone." persuasive and Audience Interests ".$persona." include special description. you can translate to ".$language." language result";

        $system_prompt1 = "you can write with descriptive voice and tone of persuasive include Special Description.";

        $client = new Client([
            'base_uri' => 'https://api.openai.com/'
        ]);
        $message = [
            ["role" => "system", "content" => $assistant], 
            ["role" => "user", "content" => $prompt."\n".$system_prompt]
        ];

        try {
            $response = $client->request('POST', 'v1/chat/completions', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . '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'
                ],
                'json' => [
                    'model' => "gpt-3.5-turbo",
                    "messages" => $message,
                    'max_tokens' => 800,
                    'temperature' => 0.4,
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            echo $data['choices'][0]['message']['content'];

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
