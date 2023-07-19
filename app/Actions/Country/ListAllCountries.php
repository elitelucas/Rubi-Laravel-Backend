<?php

namespace App\Actions\Country;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class ListAllCountries
{
    /**
     * Retrieve a list of all countries.
     *
     * @return Collection
     */
    public function handle(): Collection
    {
        return Country::orderBy('name')->get();
    }
}
