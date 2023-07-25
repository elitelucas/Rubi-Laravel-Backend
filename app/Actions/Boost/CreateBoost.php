<?php

namespace App\Actions\Boost;

use App\Models\Boost;

class CreateBoost
{
    public function handle(array $data): Boost
    {
        return Boost::create($data);
    }
}
