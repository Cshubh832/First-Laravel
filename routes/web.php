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
Route::get('/register_log', function () {
    return view('register_log');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/show', function () {
    return view('show');
});
Route::get('/new', function () {
    return view('new');
});
Route::post('/login','App\Http\Controllers\AppAuth\AppAuthController@login');

Route::get('/show','App\Http\Controllers\CustomersController@show');
Route::get('delete/{id}','App\Http\Controllers\CustomersController@destroy');
Route::post('edit/{id}','App\Http\Controllers\CustomersController@edit');
//Route::get('insert','CustomersController@insertform');
Route::post('/create','App\Http\Controllers\CustomersController@create');
Route::post('/index','App\Http\Controllers\CustomersController@index');
//Route::post('/create',[CustomersController::class, 'create']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function()
{

});
