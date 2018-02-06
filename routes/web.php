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

Route::get('/',  'Auth\LoginController@getLogin');
Route::get('/auth/login', 'Auth\LoginController@getLogin');
Route::post('/auth/login', 'Auth\LoginController@postLogin');
Route::any('/auth/logout', 'Auth\LoginController@logout');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/client/{id?}', 'ClientController@index');
Route::get('/clientlist', 'ClientController@indexlist');
Route::get('/user/{id?}', 'UserController@index');
Route::get('/userlist', 'UserController@indexlist');
Route::post('/createClient', 'ClientController@createClient');
Route::post('/createUser', 'UserController@createUser');
Route::get('/getClients/{id?}', 'ClientController@getClients');
Route::get('/deleteClient/{id}', 'ClientController@deleteClient');
//Route::post('/updateClient', 'ClientController@updateClient');

Route::resource('emailtemplates', 'EmailTemplateController');
