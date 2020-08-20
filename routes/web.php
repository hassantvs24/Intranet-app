<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/groups/archived', 'GroupsController@archived')->name('archived-groups');
Route::get('/groups/create', 'GroupsController@create')->name('create-group');
Route::post('/groups/store', 'GroupsController@store')->name('group.store');
Route::get('/groups/edit', 'GroupsController@edit')->name('edit-group');
Route::get('/group/show', 'GroupsController@show')->name('view-group');
Route::get('/invite', 'HomeController@invite_users')->name('invite');

// Boards routes
Route::get('/all-boards', 'BoardsController@index')->name('all-boards');
Route::get('/archived-boards', 'BoardsController@archived')->name('archived-boards');
Route::get('/create-board', 'BoardsController@create')->name('create-board');
Route::post('/create-board', 'BoardsController@store')->name('store-board');
Route::get('/edit-board', 'BoardsController@edit')->name('edit-board');
Route::get('/view-board', 'BoardsController@show')->name('view-board');
Route::get('/edit-infocards', 'BoardsController@info_cards')->name('edit-infocards');


// users routes
Route::get('/all-users', 'UserController@index')->name('all-users');
Route::get('/archived-users', 'UserController@archived')->name('archived-users');
Route::get('/create-user', 'UserController@create')->name('create-user');
Route::get('/edit-user', 'UserController@edit')->name('edit-user');
Route::get('/view-user', 'UserController@show')->name('view-user');
// add user account settings route
Route::get('/users/my-account', 'UserController@account_settings')->name('user-account-settings');


// admins routes
Route::get('/all-admins', 'GroupAdminsController@index')->name('all-admins');
Route::get('/archived-admins', 'GroupAdminsController@archived')->name('archived-admins');
Route::get('/create-admin', 'GroupAdminsController@create')->name('create-admin');
Route::post('/post-admin', 'GroupAdminsController@store')->name('admin.store');
Route::get('/edit-admin', 'GroupAdminsController@edit')->name('edit-admin');
Route::get('/view-admin', 'GroupAdminsController@show')->name('view-admin');
// add admin account settings route
Route::get('/admin/my-account', 'GroupAdminsController@account_settings')->name('admin-account-settings');