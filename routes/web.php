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

Route::get('/post', function () {
    return view('post');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/admin', function () {
    return view('admin.index');
});


Route::get('/login', 'AuthController@showLoginForm')->name('auth.login')->name('auth.login');
Route::post('/login', 'AuthController@login')->name('auth.login');

Route::get('/registration', 'AuthController@showRegisterForm')->name('auth.register');
Route::post('/registration', 'AuthController@register');

Route::get('/logout', 'AuthController@logout')->name('auth.logout');

Route::post('/comment/{id}', 'CommentsController@addComment')->name('comment');

Route::get('/work_deal/{user_id}/{work_details_id}', 'WorkForController@workDeal')->name('work.deal');

Route::resources(['users'=>'UsersController']);
Route::resources(['auth'=>'AuthController']);
Route::resources(['areas'=>'AreaController']);
Route::resources(['job_categories'=>'JobCategoriesController']);
Route::resources(['work_details'=>'WorkDetailsController']);
Route::resources(['work_for'=>'WorkForController']);
