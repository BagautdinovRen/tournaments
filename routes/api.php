<?php

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

Route::namespace(App\Http\Controllers\Api\Front::class)->group(function() {
    Route::get('player/{player}', 'PlayerController@show')->name('front.player.id');
    Route::get('tournaments/{tournament}', 'TournamentController@show')->name('front.tournament.show');
    Route::get('tournaments', 'TournamentController@index')->name('front.tournament.index');
});

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
