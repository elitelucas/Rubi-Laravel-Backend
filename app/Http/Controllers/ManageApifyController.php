<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ManageApifyController extends Controller
{
    //
    public function settingApify(Request $request)
    {
        $actor_name = "web scraper";
        $actor_id = "apify~web-scraper";
        $run_endpoint = "";
        $personal_api_token = "";
        $organ_api_token = "";
        $params = [];
        try {
            $apiUrl = config('apify.base_url').'/acts/apify~web-scraper/runs';
            $apiToken = config('apify.apify_api_key');

            $inputData = file_get_contents('input.json');

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiToken,
            ])->post($apiUrl, json_decode($inputData, true));

            if ($response->failed()) {
                echo 'Error: ' . $response->body();
            } else {
                echo $response;
                // echo 'Scrape job started successfully!';
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            echo $e->getMessage();
        }
    }

    public function getAllApifyStoreApps()
    {
        try {

            $token = config('apify.apify_api_key');

            // Make a GET request to the Apify API with the authentication token
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get(config('apify.base_url').'/acts?limit=10000');

            // Get the JSON response body
            if ($response->successful()) {

                $data = $response->json()['data'];

                echo dd($data);

                // Access the Apify Store apps
                $apps = $data['items'];

                // Loop through the apps and do something with each one
                foreach ($apps as $app) {
                    // Access app details
                    $name = $app['name'];
                    // $description = $app['description'];

                    // Do something with the app details
                    echo "Name: $name\n";
                    // echo "Description: $description\n";
                    echo "\n";
                }
            } else {
                echo 'Error occurred: ' . $response->body();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            echo $e->getMessage();
        }
    }
}