<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/user/account/profile', function () {
    return view('profilee'); // أسم مستند تبع شاشات العرض في مسار التالي resource/views/profilee.blade.php
})->name('profile');

Route::resource('/posts', 'PostsController');  // علشان كريت استخدم 
Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/{any_name}', 'PostsController@show');
Route::get('/posts/{year}/{month}', 'PostsController@archive');
Route::get('/sucess', 'PostsController@sucess');

/* تمر البيانات عبرة any_name عبارة عن متغير
 الموجود في كونترولid  */

/* php artisan make:controller Postscontroller2 --resource */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
