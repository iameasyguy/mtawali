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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes((['register' => false]));

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



Route::group(['middleware' => 'auth'], function () {
    Route::resource('clients', 'ClientController');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('installers', 'InstallerController');
    Route::resource('personels', 'PersonelController');
    Route::resource('projects', 'ProjectController');
    Route::resource('reports', 'ReportController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('clients/sub_counties/{county}','ClientController@getcounty');
    Route::get('projects/area/{client}','ProjectController@getarea');
    Route::get('/pdf/{report}','ReportController@downpdf')->name('pdf');

});

