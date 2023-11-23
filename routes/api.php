<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Company\IndexCompanyController;
use App\Http\Controllers\Api\Company\StoreCompanyController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->name('.v1')->group(function (): void {
    Route::middleware(['auth:sanctum'])->group(function (): void {
        Route::get('/user', [UsersController::class, 'show']);
    });

    Route::get('/companies', IndexCompanyController::class)
        ->name('.companies.index')
        ->middleware(['auth:sanctum']);

    Route::post('/companies', StoreCompanyController::class)
        ->name('.companies.store')
        ->middleware(['auth:sanctum']);
});
