<?php

use Illuminate\Support\Facades\Route;

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
    return view('public.index');
});

//Route::get('/', 'AdminController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');

//group middleware
Route::group(['middleware' => ['auth']], function () {
    //category
    Route::post('/add-category', 'CategoryController@saveCategory');
    Route::get('/category', 'CategoryController@all_category');
    Route::get('/category/{id}', 'CategoryController@delete_category');
    Route::get('/editcategory/{id}', 'CategoryController@edit_category');
    Route::post('/update-category/{id}', 'CategoryController@update_category');
    Route::get('/deletecategory/{id}', 'CategoryController@delete_multiple_category');

    //post
    Route::get('/post', 'PostController@all_post');
    Route::post('/savepost', 'PostController@save_post');
    Route::get('/deletepost/{id}', 'PostController@delete_post');
    Route::get('/post/{id}', 'PostController@edit_post');
    Route::post('/update-post/{id}', 'PostController@update_post');
});

//frontend routes
Route::get('/blogpost', 'BlogController@get_all_post');
Route::get('/categories', 'BlogController@get_all_category');
Route::get('/categorypost/{cat_slug}', 'BlogController@get_post_by_cat_slug');
Route::get('/search', 'BlogController@search_post');
Route::get('/latestpost', 'BlogController@get_latestpost');





//should be below from all routes
Route::get('/{slug}', 'BlogController@get_post_by_slug');




