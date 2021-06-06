<?php

use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('article', 'ArticleController@articles');
Route::get('article/{id}', 'ArticleController@articlesById');
Route::get('article/find/{name}', 'ArticleController@articlesByName');
Route::get('article/find/{price_from}/{price_before}', 'ArticleController@articlesByPrice');
Route::get('article/f/published', 'ArticleController@articlesPublished');
Route::get('article/f/actual', 'ArticleController@articlesActual');
Route::post('article', 'ArticleController@create');
Route::put('article/{article}', 'ArticleController@edit');
Route::delete('article/{article}', 'ArticleController@delete');
Route::get('article/bycategory/{name}', 'ArticleController@articlesByCategory');

Route::post('category', 'CategoryController@create');
Route::delete('category/{category}', 'CategoryController@delete');
