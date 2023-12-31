<?php

use Illuminate\Http\Request;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'v1'], function (){
    Route::get('test', function (){
        return "Hello BS 23";
    });

    Route::post('/rider-capture', [\App\Http\Controllers\Api\v1\RiderController::class, 'captureRider']);
    Route::get('/find-rider/{restaurantId}', [\App\Http\Controllers\Api\v1\RiderController::class, 'getNearestRider']);

});
