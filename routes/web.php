<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// default page -> dashboard / login
Route::get('/', 'HomeController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/style-guide', function () {
    return view('style-guide');
});

// admin routes
Route::get('/dashboard', 'AdminController@home')->name('admin-home');
Route::get('/all-groups', 'AdminController@index')->name('all-groups');
Route::get('/archived-groups', 'AdminController@archived')->name('archived-groups');
Route::get('/create-group', 'AdminController@create')->name('create-group');
Route::get('/edit-group', 'AdminController@edit')->name('edit-group');
Route::get('/invite', 'HomeController@invite_users')->name('invite');
