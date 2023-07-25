<?php

namespace App\Actions\Persona;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Collection;

class CreatePersona
{
    public function handle(array $data): Persona
    {
        return Persona::create($data);
    }
}
