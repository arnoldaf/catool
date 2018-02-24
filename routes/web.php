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
Route::get('/caprofile', 'CaController@indexcaprofile');
Route::get('/ca', 'CaController@indexca');

Route::get('/client/{id?}', 'ClientController@index');
Route::get('/user/{id?}', 'UserController@index');

Route::get('/clientlist', 'ClientController@indexlist');
Route::get('/userlist', 'UserController@indexlist');

Route::post('/createClient', 'ClientController@createClient');
Route::post('/createUsers', 'UserController@createUsers');

Route::get('/getClients/{id?}', 'ClientController@getClients');
Route::get('/getUsers/{id?}', 'UserController@getUsers');

Route::get('/deleteClient/{id}', 'ClientController@deleteClient');
Route::get('/deleteUsers/{id}', 'UserController@deleteUsers');

//Route::post('/updateClient', 'ClientController@updateClient');

Route::resource('/admin/email-templates', 'EmailTemplateController');
Route::resource('/admin/email-profiles', 'EmailProfileController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/db-test', function() {
   if(DB::connection()->getDatabaseName())
   {
      echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
   }
});

Route::get('document-upload', ['uses'=>'AjaxImageUploadController@ajaxImageUpload']);
Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'AjaxImageUploadController@ajaxImageUploadPost']);


Route::resource('documentmaster', 'DocumentMasterController');

