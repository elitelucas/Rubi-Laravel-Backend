<?php

namespace App\Actions\Tone;

use App\Models\Tones;
use Illuminate\Database\Eloquent\Collection;

class CreateTone
{
    public function handle(array $data): Tones
    {
        return Tones::create($data);
    }
}
