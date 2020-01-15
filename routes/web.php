<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'PagesController@index');
Route::get('contact', 'PagesController@contact');
Route::post('save-user-data','UserRegLoginController@insertData');
Route::post('verify-user','UserRegLoginController@checkLogin');
Route::get('logout', 'UserRegLoginController@logout');

/*
 Route::get('admin', function(){
    return 'you are admin';
})->middleware(['auth','auth.admin']);
*/

Route::get('admin/dashboard', [
    'uses' => 'PagesController@getAdminDashboard',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('pending-resorts', [
    'uses' => 'PagesController@getAdminDashboard',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('user/dashboard', [
    'uses' => 'PagesController@getUserDashboard',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['User','Moderator']
]);

//User Profile Section
Route::get('profile/{id}', [
    'uses' => 'UserMainController@getProfile',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

Route::get('edit-profile/{id}', [
    'uses' => 'UserMainController@getEditProfile',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);
Route::post('update-profile', [
    'uses' => 'UserMainController@updateProfile',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin','Moderator','User']
]);

//End of User Profile Section

//Admin section
Route::get('all-users', [
    'uses' => 'UserMainController@getAllUsers',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('remove-user/{id}', [
    'uses' => 'UserMainController@removeUser',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

//User Role

Route::get('users-role', [
    'uses' => 'UserMainController@getUserRoles',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('assign-roles', [
    'uses' => 'UserMainController@postAdminAssignRoles',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

//Resort section
Route::post('Create-new-resort', [
    'uses' => 'ResortsController@createNewResort',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['User','Moderator','Admin']
]);

Route::get('get-resort-list', [
    'uses' => 'ResortsController@getResorts',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['User','Moderator','Admin']
]);
Route::get('resorts/{category}', [
    'uses' => 'ResortsController@getResortsByCategory'
]);

Route::get('resort-info/{id}', [
    'uses' => 'ResortsController@viewResort'
]);

Route::get('resort-booking-updates/{id}', [
    'uses' => 'ResortsController@resortBookingUpdates',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['User','Moderator','Admin']
]);

Route::get('approve-resort/{id}', [
    'uses' => 'ResortsController@approveResort',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::get('remove-resort/{id}', [
    'uses' => 'ResortsController@removeResort',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Moderator','User', 'Admin']
]);

Route::post('check-availability', [
    'uses' => 'ResortsController@checkAvailability',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['User','Moderator','Admin']
]);

Route::post('confirm-resort', [
    'uses' => 'ResortsController@confirmResortBooking',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['User','Moderator','Admin']
]);



