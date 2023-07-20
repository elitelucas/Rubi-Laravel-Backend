<?php

namespace App\Actions\Collection;

use App\Models\Collection;

class CreateCollection
{
    public function handle(array $data): Collection
    {
        return Collection::create($data);
    }
}
