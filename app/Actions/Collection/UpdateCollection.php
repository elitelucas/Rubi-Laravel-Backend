<?php

namespace App\Actions\Collection;

use App\Models\Collection;

class UpdateCollection
{
    public function handle(Collection $collection, array $data): bool|Collection
    {
        $collection->forceFill($data);
        if ($collection->save()) {
            return $collection->refresh();
        }

        return false;
    }
}
