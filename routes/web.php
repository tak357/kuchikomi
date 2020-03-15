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

// トップページ
Route::get('/', 'HomeController@index');

// 商品（管理者権限用）
Route::group(['middleware' => 'auth'], function () {
    Route::get('items/create', 'ItemController@create');
    Route::post('items', 'ItemController@store');
    Route::get('items/{item}/edit', 'ItemController@edit');
    Route::patch('items/{item}', 'ItemController@update');
    Route::delete('items/{item}', 'ItemController@destroy');
});

// 商品
Route::get('items', 'ItemController@index');
Route::get('items/search', 'ItemController@search');
Route::get('items/{item}', 'ItemController@show');

// クチコミ
Route::post('kuchikomis', 'KuchikomiController@store');

// カテゴリーページ
Route::get('categories/{category}', 'CategoryController@show');