<?php

namespace App\Actions\Language;

use App\Models\Language;
use Illuminate\Database\Eloquent\Collection;

class ListAllLanguages
{
    public function handle(): Collection
    {
        return Language::orderBy('name')->get();
    }
}
