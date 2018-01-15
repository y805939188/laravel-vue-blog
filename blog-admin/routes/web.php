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

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index');
    Route::get('/login', 'AdminController@loginForm');
    Route::post('/login', 'AdminController@login');
    Route::get('/logout', 'AdminController@logout');

    Route::post('/editarticle', 'AdminController@editArticleUpdate');
    Route::get('/editarticle/{article}', 'AdminController@editArticle');

    Route::get('/delarticle/{article}', 'AdminController@delArticleUpdate');

    Route::get('/cateloglist', 'AdminController@cateloglist');
    Route::get('/addarticle', 'AdminController@addArticleShow');
    Route::post('/addarticle', 'AdminController@addArticleUpdate');
    Route::get('/editcatelog/{catelog}', 'AdminController@editCatelogShow');
    Route::post('/editcatelog', 'AdminController@editCatelogUpdate');
    Route::get('/delcatelog/{catelog}', 'AdminController@delCatelog');
    Route::get('/addcatelog', 'AdminController@addCatelogShow');
    Route::post('/addcatelog', 'AdminController@addCatelogUpdate');
    Route::get('/revisepwd', 'AdminController@revisePwdShow');
    Route::post('/revisepwd', 'AdminController@reviserPwdUpdate');
});

