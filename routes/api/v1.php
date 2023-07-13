<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CountryController;
use App\Models\Client;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// temporarily forcing super admin login
Auth::loginUsingId(1);

# usa as rotas de autenticacao do passport
//Route::post('/login', [AuthorizationController::class, 'login'])->name('login');
//Route::post('/register', [AuthController::class, 'register'])->name('register');
# cria a rota /me

Route::middleware('auth:api')->get('/me', function (Request $request) {
    return $request->user();
});

Route::post('/clients', [ClientsController::class, 'store'])
    ->name('clients.store')
    ->can('create', Client::class);

Route::post('/customers', [CustomersController::class, 'store'])
    ->name('customers.store')
    ->can('create', Customer::class);

Route::resource('countries', CountryController::class)->only('index');
