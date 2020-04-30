<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\User as UserResource;
use App\Http\Resources\GamesCollection;
use App\Games;
use App\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/user', function () {
    return new UserResource(User::find(1));
});

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::get('/games', function () {
    return new GamesCollection(Games::all());
});

Route::middleware('auth:api')->group(function() {
    Route::get('user/{userId}/detail', 'UserController@show');
});