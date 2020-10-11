<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Mail\NewUserWelcomeMail;

Auth::routes();

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});

Route::post('follow/{user}', 'App\Http\Controllers\FollowsController@store')->name('followers.show'); 

Route::get('/', 'App\Http\Controllers\PostsController@index');

Route::get('/p/create', 'App\Http\Controllers\PostsController@create');

Route::post('/p', 'App\Http\Controllers\PostsController@store');

Route::get('/p/{post}', 'App\Http\Controllers\PostsController@show');

Route::get('/profile/{user}', 'App\Http\Controllers\ProfilesController@index')->name('profile.show');

Route::get('/profile/{user}/edit', 'App\Http\Controllers\ProfilesController@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'App\Http\Controllers\ProfilesController@update')->name('profile.update');



