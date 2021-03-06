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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['api']], function () {
    Route::get('/groups/{id}', 'API\GroupController@show');
    Route::get('/group/{id}/contacts', 'API\GroupController@contacts');
    Route::get( 'eventsbyboard/{board_id}', 'API\EventController@eventbyBoard');
    Route::resource('events', 'API\EventController');
    Route::resource('cards', 'API\CardController');
});

