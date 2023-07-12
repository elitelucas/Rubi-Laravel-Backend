<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use OpenAI;
class OpenAIController extends Controller
{
    private $models = [
        "babbage" => "text-babbage-001",
        "curies" => "text-curie-001",
        "ada" => "text-ada-001",
        "davinci" => "davinci:ft-bitjar-labs-prod:rubi-2023-06-19-11-24-42",
        "code_davinci" => "code-davinci-002"
    ];

    public function open_ai(Request $request)
    {
        $client = OpenAI::client('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');

        $prompt = " Rubi, can you recommend a good podcast for comedy lovers?";

        $maxTokens = 250;

        $result = $client->completions()->create([
            'model' => $this->models['davinci'],
            'prompt' => $prompt,
            "temperature" => 0.1,
            "max_tokens" => $maxTokens,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            "stop" => ["END"]
        ]);

        echo $result['choices'][0]['text'];
    }

}