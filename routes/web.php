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
    return view('welcome');
});

Auth::routes();
Route::group(['namespace'=> 'App\Http\Controllers', 'middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('podcast/edit/{id}', 'PodcastController@uppodcast')->name('edit');
    Route::post('podcast/update/{id}', 'PodcastController@update')->name('update');
    Route::get('podcast/delete/{id}', 'PodcastController@delete')->name('delete');
    Route::get('podcast/single/{id}', 'PodcastController@single')->name('single');
    Route::resource('podcasts', 'PodcastController');

    



});


