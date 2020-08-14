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

// Boards routes
Route::get('/all-boards', 'BoardsController@index')->name('all-boards');
Route::get('/archived-boards', 'BoardsController@archived')->name('archived-boards');
Route::get('/create-board', 'BoardsController@create')->name('create-board');
Route::get('/edit-board', 'BoardsController@edit')->name('edit-board');
Route::get('/view-board', 'BoardsController@show')->name('view-board');


// users routes
Route::get('/all-users', 'UserController@index')->name('all-users');
Route::get('/archived-users', 'UserController@archived')->name('archived-users');
Route::get('/create-user', 'UserController@create')->name('create-user');
Route::get('/edit-user', 'UserController@edit')->name('edit-user');
Route::get('/view-user', 'UserController@show')->name('view-user');


// admins routes
Route::get('/all-admins', 'GroupAdminsController@index')->name('all-admins');
Route::get('/archived-admins', 'GroupAdminsController@archived')->name('archived-admins');
Route::get('/create-admin', 'GroupAdminsController@create')->name('create-admin');
Route::get('/edit-admin', 'GroupAdminsController@edit')->name('edit-admin');
Route::get('/view-admin', 'GroupAdminsController@show')->name('view-admin');
