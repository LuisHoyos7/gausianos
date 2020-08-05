<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');

Route::resource('customer', 'CustomerController');

Route::resource('category', 'CategoryController');

Route::resource('estimate', 'EstimateController');
Route::put('estimate/{estimate}', 'EstimateController@estimateAddPrice')->name('estimateAddPrice');


Route::resource('work-type', 'WorkTypeController');

Route::resource('service-type', 'ServiceTypeController');

Route::resource('service-course', 'ServiceCourseController');

Route::resource('course', 'CourseController');

Route::resource('image', 'ImageController');

Route::get('cargarCategorias', 'CategoryController@searchCategory');

Route::get('cargarCursos/{category}', 'CourseController@searchCourse');

Route::get('cargarServicios/{id}', 'ServiceCourseController@searchServiceType');

Route::get('cargarTiposTrabajos/{id}', 'WorkTypeController@searchWorkType');

Route::get('cargarTiposTrabajosEspecifico/{id}', 'WorkTypeController@searchWorkTypeEspecific');



Route::resource('asesor', 'AsesorController');
