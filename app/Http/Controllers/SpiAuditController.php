<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SpiAuditController extends Controller
{
    protected $scrapingData;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = "https://github.com";
        $this->getDatafromScraper(url: $url);
        echo $this->scrapingData[0]['random_text_from_the_page'];
        $data = $this->scrapingData[0]['random_text_from_the_page'];
        $ai_detection = $this->getAIDetection(prompts: $data);
        $plag = $this->getPlag(prompts: $data);
        return [
            'AI_dectection' => $ai_detection,
            'Plagiarism & readability' => $plag
        ];
        // return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $ai_detection = $this->getAIDetection(prompts: $request->input('prompt'));
        $plag = $this->getPlag(prompts: $request->input('prompt'));
        return [
            'AI_dectection' => $ai_detection,
            'Plagiarism & readability' => $plag
        ];
    }

    public function getAIDetection(string $prompts)
    {
        $prompt = [
            'content' => $prompts,
            'title' => 'optional title'
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => config('originality.ai_detection_api'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $prompt,
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "X-OAI-API-KEY: " . config('originality.originality_api_key')
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $this->getAIDetection($prompts);
        } else {
            return json_decode($response);
        }
    }

    public function getPlag(string $prompts)
    {
        $prompt = [
            'content' => $prompts,
            'title' => 'optional title'
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => config('originality.plag_api'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $prompt,
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "X-OAI-API-KEY: " . env('ORIGINALITY_API_KEY')
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $this->getPlag($prompts);
        } else {
            return json_decode($response);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function getDatafromScraper(string $url)
    {
        $apiUrl = config('apify.base_url') . '/acts/apify~web-scraper/runs';
        $apiToken = config('apify.apify_api_key');

        $inputData = file_get_contents(__DIR__ . '/input.json');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $apiToken,
        ])->post($apiUrl, json_decode($inputData, true));

        if ($response->failed()) {
            return 'Error: ' . $response->body();
        } else {
            $actor_id = $response['data']['actId'];
            $dataset_id = $response['data']['defaultDatasetId'];
            return $this->getDatasetStatus(dataset_id: $dataset_id, actor_id: $actor_id);
        }

    }

    public function getDatasetItem(string $dataset_id)
    {
        try {
            $url = config('apify.base_url') . '/datasets/' . $dataset_id . '/items';

            $response = Http::get($url);

            if ($response->successful()) {
                // The request was successful (status code 2xx)
                $data = $response->json(); // Get the response body as JSON
                $this->scrapingData = $data;
                // Process the data...
            } else {
                // The request failed (status code 4xx or 5xx)
                echo $response->status(); // Get the status code
                echo $response->body(); // Get the response body

                // Handle the error...
            }

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $e->getMessage();
        }

    }

    public function getDatasetStatus(string $dataset_id, string $actor_id)
    {
        try {
            $apiUrl = config('apify.base_url') . '/acts/' . $actor_id . '/runs/last';
            $apiToken = config('apify.apify_api_key');

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiToken,
            ])->get($apiUrl);

            if ($response->failed()) {
                return 'Error: ' . $response->body();
            } else {
                if ($response['data']['status'] == "SUCCEEDED") {
                    return $this->getDatasetItem(dataset_id: $dataset_id);
                } else
                    $this->getDatasetStatus(dataset_id: $dataset_id, actor_id: $actor_id);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}