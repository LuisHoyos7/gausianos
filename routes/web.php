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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('customer', 'CustomerController');

Route::resource('category', 'CategoryController');

Route::resource('estimate', 'EstimateController');

Route::resource('work-type', 'WorkTypeController');

Route::resource('service-type', 'ServiceTypeController');

Route::resource('course', 'CourseController');

Route::resource('image', 'ImageController');
