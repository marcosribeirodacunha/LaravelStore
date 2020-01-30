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

Auth::routes();

Route::get('/', 'Customer\HomeController@index')->name('home');

/* -------------- Customer routes -------------- */
Route::group([
    'prefix' => 'products',
    'as' => 'products.',
    'namespace' => 'customer'
], function () {

    Route::get  ( '/',              'ProductController@index'   )->name('index');   // products.index
    Route::get  ( '/{product}',     'ProductController@show'    )->name('show');    // products.show

});

/* -------------- Admin routes -------------- */
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'admin'
], function () {

    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::group([
       'prefix' => 'products',
       'as' => 'products.'
    ], function () {

        Route::get      ( '/',                 'ProductController@index'   )->name('index');   // admin.products.index
        Route::get      ( '/create',           'ProductController@create'  )->name('create');  // admin.products.create
        Route::post     ( '/',                 'ProductController@store'   )->name('store');   // admin.products.store
        Route::get      ( '/{product}',        'ProductController@show'    )->name('show');    // admin.products.show
        Route::get      ( '/{product}/edit',   'ProductController@edit'    )->name('edit');    // admin.products.edit
        Route::put      ( '/{product}',        'ProductController@update'  )->name('update');  // admin.products.update
        Route::delete   ( '/{product}',        'ProductController@destroy' )->name('destroy'); // admin.products.destroy
    });

});


















