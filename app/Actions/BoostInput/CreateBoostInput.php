<?php

namespace App\Actions\BoostInput;

use App\Models\BoostInput;

class CreateBoostInput
{
    public function handle(array $data): BoostInput
    {
        return BoostInput::create($data);
    }
}
