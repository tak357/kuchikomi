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

// 商品（管理者用）
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

// クチコミ（管理者用）
Route::group(['middleware' => 'auth'], function () {
    Route::delete('kuchikomis/{kuchikomi}', 'KuchikomiController@destroy');
    Route::post('kuchikomis', 'KuchikomiController@store');
});

// カテゴリー（管理者用）
Route::group(['middleware' => 'auth'], function () {
    Route::get('categories/create', 'CategoryController@create');
    Route::post('categories', 'CategoryController@store');
    Route::get('categories/{category}/edit', 'CategoryController@edit');
    Route::patch('categories/edit', 'CategoryController@update');
    Route::delete('categories/{category}', 'CategoryController@destroy');
});

// カテゴリー（非ログインユーザー用）
Route::get('categories', 'CategoryController@index');
Route::get('categories/{category}', 'CategoryController@show');

// 問い合わせフォーム
Route::get('form', 'InquiryFormController@index')->name('form');
Route::get('form/confirm', 'InquiryFormController@confirm')->name('form.confirm');
Route::post('form', 'InquiryFormController@store');
