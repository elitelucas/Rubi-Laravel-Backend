<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
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

// temporarily forcing non-superadmin login
Auth::loginUsingId(2);

# usa as rotas de autenticacao do passport
//Route::post('/login', [AuthorizationController::class, 'login'])->name('login');
//Route::post('/register', [AuthController::class, 'register'])->name('register');
# cria a rota /me

Route::middleware('auth:api')->get('/me', function (Request $request) {
    return $request->user();
});

Route::resource('clients', ClientController::class)->only('store');
Route::resource('customers', CustomerController::class)->only('store');
Route::resource('countries', CountryController::class)->only('index');
Route::resource('super-admins', SuperAdminController::class)->only('store');
Route::resource('users', UserController::class)->only('update');
Route::resource('languages', LanguageController::class)->only('index');
