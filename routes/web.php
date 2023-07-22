<?php

use App\Http\Controllers\ManageApifyController;
use App\Http\Controllers\ModuleGeneraterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenAIController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// //Rubi chatbot
// Route::get('/openai', [OpenAIController::class, 'open_ai']);

// //Admin module generater
// Route::get('/admin/moduleGenerater', [ModuleGeneraterController::class, 'getOpenAIResponse'])->name('admin.moduleGenerater.getOpenAIResponse');

// //Apfiy
// Route::get('/admin/apify', [ManageApifyController::class, 'settingApify']);
// Route::get('/admin/getAllStore', [ManageApifyController::class, 'getAllApifyStoreApps']);
