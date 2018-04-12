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

Route::post('v1/createVendor', 'Api\VendorBillingController@createVendor');
Route::get('v1/vendor/{id?}', 'Api\VendorBillingController@vendor');
Route::get('v1/deleteVendor/{id}', 'Api\VendorBillingController@deleteVendor');

Route::post('v1/createVendorBilling', 'Api\VendorBillingController@createVendorBilling');
Route::get('v1/vendorBilling/{id?}', 'Api\VendorBillingController@vendorBilling');
Route::get('v1/deleteVendorBilling/{id}', 'Api\VendorBillingController@deleteVendorBilling');
