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

/***************************************  Start Categories Routes  ***************************************************/

use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function() {
    Route::get('/', 'CategoriesController@index')->name('categories.index');
    Route::get('create', 'CategoriesController@create')->name('categories.create');
    Route::post('store', 'CategoriesController@store')->name('categories.store');
    Route::get('edit/{id}', 'CategoriesController@edit')->name('categories.edit');
    Route::put('update/{id}', 'CategoriesController@update')->name('categories.update');
    Route::delete('delete/{id}', 'CategoriesController@destroy')->name('categories.delete');
    Route::get('show/{id}', 'CategoriesController@show')->name('categories.show');

});

/***************************************  End Categories Routes  ***************************************************/


/***************************************  Start Products Routes  ***************************************************/
Route::prefix('products')->group(function() {
    Route::get('/', 'ProductsController@index')->name('products.index');
    Route::get('create', 'ProductsController@create')->name('products.create');
    Route::post('store', 'ProductsController@store')->name('products.store');
    Route::get('edit/{id}', 'ProductsController@edit')->name('products.edit');
    Route::put('update/{id}', 'ProductsController@update')->name('products.update');
    Route::delete('delete/{id}', 'ProductsController@destroy')->name('products.delete');
    Route::get('show/{id}', 'ProductsController@show')->name('products.show');

});
/***************************************  End Products Routes  ***************************************************/
