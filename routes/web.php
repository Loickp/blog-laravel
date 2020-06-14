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

/* Blog routes */
Route::get('/', 'BlogController@index');
Route::get('/post/{id}', 'BlogController@show');

Route::middleware('auth', 'redactor')->group(function(){
    Route::get('/create', 'BlogController@create');
    Route::post('/create', 'BlogController@store');
});

/* Panel routes */
Route::middleware('auth', 'redactor')->group(function(){
    Route::get('/panel', 'PanelController@index');
    Route::get('/panel/edit/{id}', 'PanelController@show');
    Route::post('/panel/edit/{id}', 'PanelController@update');
    Route::delete('/panel/delete/{id}', 'PanelController@destroy');
});


/* Auth routes */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
