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

Route::get('/', function () 
{
	return view('welcome');
});

//Route for listing all users
Route::get('/api/users', 'UserManagementController@index');

//adding new user route
Route::post('/api/add_user', 'UserManagementController@store');

//Route for returning User data by unique identifier
Route::get('/api/get_user/{id}', 'UserManagementController@show');


