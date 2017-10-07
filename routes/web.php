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
Route::get('/', 'BookPackageController@index');
Route::post('/', 'BookPackageController@store');
Route::get('/{book_package}', 'BookPackageController@show');
Route::patch('/{book_package}', 'BookPackageController@update');
Route::delete('/{book_package}', 'BookPackageController@destroy');

Route::post('books', 'BookController@store');
Route::delete('books/{book}', 'BookController@destroy');
