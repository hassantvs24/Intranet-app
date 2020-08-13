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
Route::get('/dashboard', 'GroupsController@home')->name('admin-home');
Route::get('/all-groups', 'GroupsController@index')->name('all-groups');
Route::get('/archived-groups', 'GroupsController@archived')->name('archived-groups');
Route::get('/create-group', 'GroupsController@create')->name('create-group');
Route::get('/edit-group', 'GroupsController@edit')->name('edit-group');
Route::get('/view-group', 'GroupsController@show')->name('view-group');
Route::get('/invite', 'HomeController@invite_users')->name('invite');

// users controller
Route::get('/all-users', 'UserController@index')->name('all-users');
Route::get('/archived-users', 'UserController@archived')->name('archived-users');
Route::get('/create-user', 'UserController@create')->name('create-user');
Route::get('/edit-user', 'UserController@edit')->name('edit-user');
Route::get('/view-user', 'UserController@show')->name('view-user');
