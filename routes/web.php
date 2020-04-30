<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'DropboxController@form')->name('home');
Route::post('/upload', 'DropboxController@upload')->name('upload');
