<?php

namespace App\Actions\Voice;

use App\Models\Voice;
use Illuminate\Database\Eloquent\Collection;

class CreateVoice
{
    public function handle(array $data): Voice
    {
        return Voice::create($data);
    }
}
