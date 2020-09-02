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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::GET('test', function(){
    return response()->json(['Success'=>'Working']);
});

Route::GET('test2', 'Api\UserController@test');



Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

// Route::group(['middleware' => 'auth:api'], function(){
    Route::post('edit_user/{id}', 'Api\UserController@editUser');
    Route::post('post_company', 'Api\CompanyController@postCompany');
    Route::Get('list_company', 'Api\CompanyController@listCompany');
    // Route::post('delete_company/{$id}', 'Api\CompanyController@deleteCompany');
    Route::Get('list_grant', 'Api\GrantController@listGrant');
    Route::POST('bookmark', 'Api\UserController@bookmarkgrant');
    Route::Get('list_bookmark/{id}', 'Api\UserController@listbookmark');
    Route::post('edit_user_type/{id}', 'Api\UserController@editUserType');
    Route::Get('/getgrantPaid','Api\UserController@getgrantPaid');
    Route::POST('/notify','Api\UserController@notification');
// });



