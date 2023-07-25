<?php

namespace App\Actions\Tone;

use App\Models\Tone;
use Illuminate\Database\Eloquent\Collection;

class CreateTone
{
    public function handle(array $data): Tone
    {
        return Tone::create($data);
    }
}
