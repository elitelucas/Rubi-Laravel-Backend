<?php

namespace App\Actions\Collection;

use App\Models\Collection;

class RemoveCollection
{
    public function handle(Collection $collection)
    {
        return $collection->delete();
    }
}
