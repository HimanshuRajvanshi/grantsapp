<?php

use Illuminate\Support\Facades\Route;

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


Route::get('user/post', 'ShowProfile@get_post');

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
/* Route::get('/register', function () {
   return view('auth/register');
}); */
Route::get('/', function () {
   return view('home');
})->middleware('auth');

Route::get('/companies_list', 'CompanyController@index');
Route::get('/edit_comp/{id}','CompanyController@edit');
Route::patch('/add_update/{id}','CompanyController@update');
Route::delete('/com_del/{id}','CompanyController@destroy');
Route::post('/add_comp', 'CompanyController@store');

Route::get('/add_comp', function () {
   return view('add_comp');
});

Route::get('/grants', 'GrantController@index');

Route::get('/add_grant', function () {
   return view('add_grant');
});

Route::post('/add_grant', 'GrantController@store');

Route::get('/edit_grant/{id}','GrantController@edit');

Route::patch('/grant_update/{id}','GrantController@update');
Route::delete('/grant_del/{id}','GrantController@destroy');

// Route::get('/users', function () {
//    return view('users');
// });


Route::get('/users','UserController@userList');
// Route::get('/user_view/{$id}','UserController@userList');

Route::get('/user_view', function () {
   return view('user_view');
});
