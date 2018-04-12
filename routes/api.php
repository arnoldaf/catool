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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('v1/aside-navs', 'Api\MenuController@getMenus');



Route::get('v1/dashboard', 'DashboardController@index');

Route::get('v1/user/{id?}', 'Api\UserController@index');
Route::get('v1/users', 'Api\UserController@indexlist');
Route::post('v1/createUsers', 'Api\UserController@createUsers');
Route::get('v1/getUsers/{id?}', 'Api\UserController@getUsers');

Route::get('v1/client/{id?}', 'Api\ClientController@index');
Route::get('v1/clients', 'Api\ClientController@indexlist');
Route::post('v1/createClient', 'Api\ClientController@createClient');
Route::get('v1/getClients/{id?}', 'Api\ClientController@getClients');
Route::get('/deleteClient/{id}', 'Api\ClientController@deleteClient');

Route::get('v1/home', 'HomeController@index')->name('home');

Route::post('v1/createEnquiry', 'Api\EnquiryController@createEnquiry');

Route::get('v1/roles/{id?}', 'Api\RolesController@roles');
Route::get('v1/rolePerm/{id?}', 'Api\RolesController@rolePerm');
Route::post('v1/createRole', 'Api\RolesController@createRole');
Route::post('v1/createRolePerm', 'Api\RolesController@createRolePerm');
Route::get('v1/deleteRolePerm/{id}', 'Api\RolesController@deleteRolePerm');
Route::get('v1/menu/{id?}', 'Api\RolesController@menu');
Route::post('v1/createMenu', 'Api\RolesController@createMenu');
Route::get('v1/deleteMenu/{id}', 'Api\RolesController@deleteMenu');

Route::post('v1/updatePassword', 'Api\UserController@updatePassword');
Route::post('v1/forgotPassword', 'Api\UserController@forgotPassword');

Route::get('v1/plans/{id?}', 'Api\BillingPlanController@plans');
Route::post('v1/createPlan', 'Api\BillingPlanController@createPlan');
Route::get('v1/deletePlan/{id}', 'Api\BillingPlanController@deletePlan');
Route::get('v1/billing/{id?}', 'Api\BillingPlanController@billing');



Route::post('v1/createVendor', 'Api\VendorBillingController@createVendor');
Route::get('v1/vendor/{id?}', 'Api\VendorBillingController@vendor');
Route::get('v1/deleteVendor/{id}', 'Api\VendorBillingController@deleteVendor');

Route::post('v1/createVendorBilling', 'Api\VendorBillingController@createVendorBilling');
Route::get('v1/vendorBilling/{id?}', 'Api\VendorBillingController@vendorBilling');
Route::get('v1/deleteVendorBilling/{id}', 'Api\VendorBillingController@deleteVendorBilling');
