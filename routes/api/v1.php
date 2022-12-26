<?php
declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ShiftController;

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

// Auth route
Route::group(['prefix' => 'auth'], function(){
    Route::post('login', [AuthController::class, 'login']);
    Route::post('change-password', [AuthController::class, 'changePassword']);

    Route::group(['middleware' => ['auth:sanctum']], function(){
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

Route::group(['prefix' => 'shifts'], function (){
    Route::group(['middleware' => ['auth:sanctum', 'checkPassword']], function(){
        Route::controller(ShiftController::class)->group(function () {
            Route::post('start', 'startShift');
            Route::post('end', 'endShift');
        });
    });
});

Route::fallback(fn () => response()->json(['error' => 'Endpoint Not found'], 404));

