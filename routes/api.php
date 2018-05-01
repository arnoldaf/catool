<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('v1/auth/login', 'Auth\LoginController@postLoginAuth');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 Route::get('v1/verify',  'Api\UserController@verify');
 
Route::group(['prefix' => 'v1/', 'middleware' => ['auth.api']], function() {
	Route::get('aside-navs', 'Api\MenuController@getMenus');
	Route::get('dashboard', 'DashboardController@index');

	Route::get('user/{id?}', 'Api\UserController@index');
	Route::get('users', 'Api\UserController@indexlist');
	//Route::post('createUsers', 'Api\UserController@createUsers');
        Route::post('getUsers', 'Api\UserController@addUser');
	Route::get('getUsers/{id?}', 'Api\UserController@getUsers');
        Route::put('getUsers/{id?}', 'Api\UserController@addUser');
        Route::delete('getUsers/{id?}', 'Api\UserController@deleteUsers');
        
        Route::post('getCaUsers', 'Api\UserController@addCaUser');
	Route::get('getCaUsers/{id?}', 'Api\UserController@getCaUsers');
        Route::put('getCaUsers/{id?}', 'Api\UserController@addCaUser');
        Route::delete('getCaUsers/{id?}', 'Api\UserController@deleteCaUsers');
        

	Route::get('client/{id?}', 'Api\ClientController@index');
	Route::get('clients', 'Api\ClientController@indexlist');
	Route::post('createClient', 'Api\ClientController@createClient');
	Route::get('getClients/{id?}', 'Api\ClientController@getClients');
	Route::get('/deleteClient/{id}', 'Api\ClientController@deleteClient');

	Route::get('home', 'HomeController@index')->name('home');

	Route::post('createEnquiry', 'Api\EnquiryController@createEnquiry');

	Route::get('role/{id?}', 'Api\RolesController@roles');
	Route::post('role', 'Api\RolesController@createRole');
	Route::delete('role', 'Api\RolesController@deleteRole');
	
	Route::post('rolePerm', 'Api\RolesController@createRolePerm');
	Route::get('rolePerm/{id?}', 'Api\RolesController@rolePerm');
	Route::delete('rolePerm/{id}', 'Api\RolesController@deleteRolePerm');
	
	Route::get('menu/{id?}', 'Api\RolesController@menu');
	Route::post('menu', 'Api\RolesController@createMenu');
	Route::delete('menu/{id}', 'Api\RolesController@deleteMenu');

	Route::post('updatePassword', 'Api\UserController@updatePassword');
	Route::post('forgotPassword', 'Api\UserController@forgotPassword');

	Route::get('plan/{id?}', 'Api\BillingPlanController@plans');
	Route::post('plan', 'Api\BillingPlanController@createPlan');
	Route::delete('plan/{id}', 'Api\BillingPlanController@deletePlan');
	
	Route::get('billing/{id?}', 'Api\BillingPlanController@billing');

	Route::post('vendor', 'Api\VendorBillingController@createVendor');
	Route::get('vendor/{id?}', 'Api\VendorBillingController@vendor');
	Route::delete('vendor/{id}', 'Api\VendorBillingController@deleteVendor');
	
	Route::post('vendorBilling', 'Api\VendorBillingController@createVendorBilling');
	Route::get('vendorBilling/{id?}', 'Api\VendorBillingController@vendorBilling');
	Route::delete('vendorBilling/{id}', 'Api\VendorBillingController@deleteVendorBilling');
        Route::get('article-topics', 'Api\ArticleController@getArticleTopics');
        Route::post('articles', 'Api\ArticleController@saveArticles');
        Route::get('articles', 'Api\ArticleController@getArticles');
        Route::get('articles/intern-users', 'Api\ArticleController@getInternUsers');
        Route::get('users/{userId}/articles', 'Api\ArticleController@getArticles');
        Route::delete('articles/{id}', 'Api\ArticleController@delete');
        Route::put('articles/{id}', 'Api\ArticleController@updateStatus');
});
