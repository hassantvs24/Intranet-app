<?php

use App\Http\Controllers\MailController;
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

// Route::get('locale/{locale}', function ($locale){
//     Session::put('language', $locale);

//     if (request()->fullUrl() === redirect()->back()->getTargetUrl()) {
//         return redirect('/');
//     }

//     return redirect()->back();
// });

Route::redirect('/', app()->getLocale() );

Route::group([ 'prefix' => '{language}', 'where' => ['locale' => '[a-zA-Z]'] ], function() {
    // default page -> dashboard / login
    Route::get('/', 'HomeController@index');

    Auth::routes(['verify' => true]);

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/style-guide', function () {
        return view('style-guide');
    });

    // Email sending routes
    Route::post('/send-email','MailController@new_mail')->name('email.send');

    Route::middleware([ 'admin' ])->group(function () {
        // admin routes
        Route::get('/dashboard', 'GroupsController@home')->name('admin-home');

        Route::get('/all-groups', 'GroupsController@index')->name('all-groups');
        Route::get('/groups/archived', 'GroupsController@archived')->name('archived-groups');
        Route::get('/groups/create', 'GroupsController@create')->name('create-group');
        Route::post('/groups/store', 'GroupsController@store')->name('group.store');
        Route::get('/groups/edit/{id}', 'GroupsController@edit')->name('edit-group');
        Route::put('/groups/update/{id}', 'GroupsController@update')->name('update-group');
        Route::get('/group/show/{id}', 'GroupsController@show')->name('view-group');
        Route::get('/invite', ['middleware' => 'guest', 'uses' => 'InvitationController@invite'] )->name('invite-user');

        // // Boards routes
        Route::get('/all-boards', 'BoardsController@index')->name('all-boards');
        Route::get('/archived-boards', 'BoardsController@archived')->name('archived-boards');
        Route::get('/create-board', 'BoardsController@create')->name('create-board');
        Route::post('/save-board', 'BoardsController@store')->name('store-board');
        Route::get('/view-board/{id}', 'BoardsController@show')->name('view-board');
        Route::get('/edit-board/{id}', 'BoardsController@edit')->name('edit-board');
        Route::put('/update-board/{id}', 'BoardsController@update')->name('update-board');
        Route::delete('/delete-board/{id}', 'BoardsController@destroy')->name('delete-board');
        Route::get('/edit-infocards/board/{id}', 'BoardsController@info_cards')->name('edit-infocards');

        // // users routes
        Route::get('/all-users', 'UserController@index')->name('all-users');
        Route::get('/archived-users', 'UserController@archived')->name('archived-users');
        Route::get('/create-user', 'UserController@create')->name('create-user');
        Route::get('/view-user/{id}', 'UserController@show')->name('view-user');
        Route::post('/save-user', 'UserController@store')->name('save-user');
        Route::get('/edit-user/{id}', 'UserController@edit')->name('edit-user');
        Route::put('/update-user/{id}', 'UserController@update')->name('update-user');
        Route::delete('/delete-user/{id}', 'UserController@destroy')->name('delete-user');
        // // add user account settings route
        Route::get('/users/my-account', 'UserController@account_settings')->name('user-account-settings');

        // // admins routes
        Route::get('/all-admins', 'GroupAdminsController@index')->name('all-admins');
        Route::get('/archived-admins', 'GroupAdminsController@archived')->name('archived-admins');
        Route::get('/create-admin', 'GroupAdminsController@create')->name('create-admin');
        Route::post('/save-admin', 'GroupAdminsController@store')->name('admin.store');
        Route::get('/view-admin/{id}', 'GroupAdminsController@show')->name('view-admin');
        Route::get('/edit-admin/{id}', 'GroupAdminsController@edit')->name('edit-admin');
        Route::put('/update-admin/{id}', 'GroupAdminsController@update')->name('update-admin');
        Route::delete('/delete-admin/{id}', 'GroupAdminsController@destroy')->name('delete-admin');
        // add admin account settings route
        Route::get('/admin/my-account', 'GroupAdminsController@account_settings')->name('admin-account-settings');
        Route::post('/admin/my-account', 'GroupAdminsController@update_account_settings')->name('admin-account-settings');
    });
});
