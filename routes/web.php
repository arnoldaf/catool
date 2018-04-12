
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


Route::resource('emailtemplates', 'EmailTemplateController');

Auth::routes();

/*
Route::get('/dashboard', 'DashboardController@index');

Route::get('/user/{id?}', 'UserController@index');
Route::get('/users', 'UserController@indexlist');
Route::post('/createUsers', 'UserController@createUsers');
Route::get('/getUsers/{id?}', 'UserController@getUsers');
//Route::get('/deleteUsers/{id}', 'UserController@deleteUsers');

Route::get('/client/{id?}', 'ClientController@index');
Route::get('/clients', 'ClientController@indexlist');
Route::post('/createClient', 'ClientController@createClient');
Route::get('/getClients/{id?}', 'ClientController@getClients');
Route::get('/deleteClient/{id}', 'ClientController@deleteClient');

//Route::get('/deleteUsers/{id}', 'UserController@deleteUsers');

//Route::post('/updateClient', 'ClientController@updateClient');

Route::resource('emailtemplates', 'EmailTemplateController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/createEnquiry', 'EnquiryController@createEnquiry');

Route::get('/roles/{id?}', 'RolesController@roles');
Route::get('/rolePerm/{id?}', 'RolesController@rolePerm');
Route::post('/createRole', 'RolesController@createRole');
Route::post('/createRolePerm', 'RolesController@createRolePerm');
Route::get('/deleteRolePerm/{id}', 'RolesController@deleteRolePerm');
Route::get('/menu/{id?}', 'RolesController@menu');
Route::post('/createMenu', 'RolesController@createMenu');
Route::get('/deleteMenu/{id}', 'RolesController@deleteMenu');

Route::post('/updatePassword', 'UserController@updatePassword');
Route::post('/forgotPassword', 'UserController@forgotPassword');

Route::get('/plans/{id?}', 'BillingPlanController@plans');
Route::post('/createPlan', 'BillingPlanController@createPlan');
Route::get('/deletePlan/{id}', 'BillingPlanController@deletePlan');
Route::get('/billing/{id?}', 'BillingPlanController@billing');
*/
