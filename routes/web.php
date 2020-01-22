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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'products',
    'as' => 'products.',
], function () {

    Route::get      ( '/',                  'ProductController@index'   )->name('index');   // products.index
    Route::get      ( '/create',            'ProductController@create'  )->name('create');  // products.create
    Route::post     ( '/',                  'ProductController@store'   )->name('store');   // products.store
    Route::get      ( '/{product}',         'ProductController@show'    )->name('show');    // products.show
    Route::get      ( '/{product}/edit',    'ProductController@edit'    )->name('edit');    // products.edit
    Route::put      ( '/{product}',         'ProductController@update'  )->name('update');  // products.update
    Route::delete   ( '/{product}',         'ProductController@destroy' )->name('destroy'); // products.destroy
});
