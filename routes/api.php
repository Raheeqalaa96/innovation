<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// customers API 
Route::get('/customers', 'ApiCustomerController@index');
Route::get('/customers/show/{id}', 'ApiCustomerController@show');
Route::post('/customers/store', 'ApiCustomerController@store');
Route::post('/customers/update/{id}', 'ApiCustomerController@update');
Route::get('/customers/delete/{id}', 'ApiCustomerController@delete');

// company API 
Route::get('/companies', 'ApiCompanyController@index');
Route::get('/companies/show/{id}', 'ApiCompanyController@show');
Route::post('/companies/store', 'ApiCompanyController@store');
Route::post('/companies/update/{id}', 'ApiCompanyController@update');
Route::get('/companies/delete/{id}', 'ApiCompanyController@delete');

//////branches
Route::get('/branches', 'ApiBranchesController@index');
Route::get('/branches/show/{id}', 'ApiBranchesController@show');
Route::post('/branches/store', 'ApiBranchesController@store');
Route::post('/branches/update/{id}', 'ApiBranchesController@update');
Route::get('/branches/delete/{id}', 'ApiBranchesController@delete');


///////stores
Route::get('/stores', 'ApiStoresController@index');
Route::get('/stores/show/{id}', 'ApiStoresController@show');
Route::post('/stores/store', 'ApiStoresController@store');
Route::post('/stores/update/{id}', 'ApiStoresController@update');
Route::get('/stores/delete/{id}', 'ApiStoresController@delete');









//////////////////////////////////////////////////////////////////////////
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
