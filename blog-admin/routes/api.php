<?php

use Illuminate\Http\Request;
header('Access-Control-Allow-Origin:*');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// api.php中的路由会在访问时自动加上api前缀
Route::group([], function() {
    Route::get('/data/total', 'ApiController@getTotal');
    Route::get('/data/{page}', 'ApiController@getArticle');
    Route::get('/article/{article}', 'ApiController@getArticleContent');
    Route::get('/catelog', 'ApiController@getCatelog');
    Route::get('/catelog/{catelog}', 'ApiController@getCatelogArticle');
});
