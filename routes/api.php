<?php

use App\Http\Controllers\authcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\DesksController;

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

Route::post('login', [authcontroller::class, 'login']);
Route::post('register', [authcontroller::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [authcontroller::class, 'logout']);
    Route::get('get_user', [authcontroller::class, 'get_user']);

    Route::resource('rooms', RoomsController::class);
    Route::post('rooms/assign', [RoomsController::class, 'assign']);
    Route::post('desks/rent', [DesksController::class, 'rent']);
    Route::resource('desks', DesksController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
