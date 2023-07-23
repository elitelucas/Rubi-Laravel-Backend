<?php

namespace App\Actions\Voice;

use App\Models\Voices;
use Illuminate\Database\Eloquent\Collection;

class CreateVoice
{
    public function handle(array $data): Voices
    {
        return Voices::create($data);
    }
}
