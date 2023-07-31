<?php

use App\Http\Controllers\AdminModuleComponentController;
use App\Http\Controllers\AdminModuleGeneratorController;
use App\Http\Controllers\AdminSaveModulesController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CollaboratorRegisterController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\PriceTypeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpiAuditController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\WorkspaceKeywordController;
use App\Http\Middleware\ValidateSignature;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AuthorizationController;

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

//// temporarily forcing non-superadmin login
//Auth::guard('api')->loginUsingId(3);

//# cria uma rota de login que irá retornar um token de acesso
Route::post('login', CustomAuthController::class);

# All routes in this group will be protected
Route::middleware('auth:api')->group(function () {
    Route::apiResource('clients', ClientController::class)->only(['index', 'store']);
    Route::apiResource('customers', CustomerController::class)->only(['index', 'store']);
    Route::apiResource('countries', CountryController::class)->only('index');
    Route::apiResource('super-admins', SuperAdminController::class)->only(['index', 'store']);
    Route::apiResource('users', UserController::class)->only('update');
    Route::apiResource('languages', LanguageController::class)->only('index');
    Route::apiResource('collections', CollectionController::class);
    Route::apiResource('subscriptions', SubscriptionController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('orders.items', OrderItemController::class)->scoped();
    Route::apiResource('order-statuses', OrderStatusController::class);
    Route::apiResource('product-categories', ProductCategoryController::class);
    Route::apiResource('spi-audit', SpiAuditController::class);
    Route::apiResource('user.workspaces', WorkspaceController::class)->scoped();
    Route::apiResource('workspace.keywords', WorkspaceKeywordController::class)->scoped();
    Route::apiResource('user.invitations', InvitationController::class)->scoped();
    Route::apiResource('price-types', PriceTypeController::class);

    // test route for user details
    Route::get('/me', function (Request $request) {
        return new UserResource($request->user());
    });
});

Route::middleware(ValidateSignature::class)
    ->post('register', CollaboratorRegisterController::class)
    ->name('register');

Route::prefix('admin')->group(function () {
    Route::apiResource('/module-generator', AdminModuleGeneratorController::class);
    Route::apiResource('/save-modules', AdminSaveModulesController::class);
    Route::apiResource('/save-module-components', AdminModuleComponentController::class);
    Route::apiResource('/persona', PersonasController::class);
});

