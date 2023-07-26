<?php

namespace App\Actions\Passport;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Passport\ClientRepository;


class CreatePassportClient
{
    private $clientRepository;

    // Injetar o ClientRepository via construtor
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function handle($user, $client_url)
    {
        // Cria um novo cliente no passport usando os dados do usuário recem criado
        $client = $this->clientRepository->create($user->id, $user->client->business_name, $client_url);
        return $client;
    }
}
