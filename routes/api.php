<?php

use App\Http\Controllers\api\AutoController;
use App\Http\Controllers\api\DateController;
use App\Http\Controllers\api\ModController;
use Illuminate\Http\Request;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resources([
    'autos'=>AutoController::class,
    'mods'=>ModController::class,
    'date'=>DateController::class
]);
