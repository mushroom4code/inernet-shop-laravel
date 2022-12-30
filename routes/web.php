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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);


Route::middleware(['set_locale'])->group(function () {
    Route::get('/', 'MainController@index')->name('index');
    Route::get('/categories', 'MainController@categories')->name('categories');

    Route::group(['prefix' => 'basket'], function () {
        Route::post('/add/{product}', 'BasketController@basketAdd')->name('basket-add');

        Route::group([
            'middleware' => 'basket_not_empty',
        ], function () {
            Route::get('/', 'BasketController@basket')->name('basket');
            Route::post('/remove/{product}', 'BasketController@basketRemove')->name('basket-remove');
        });
    });

    Route::get('/{category}', 'MainController@category')->name('category');
    Route::get('/{category}/{product}/{productId}', 'MainController@product')->name('product');
});
