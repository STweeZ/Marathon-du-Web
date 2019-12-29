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

use App\Genre;
use App\Http\Resources\GenreResource;
use App\Http\Resources\SerieResource;
use App\Serie;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::resource('serie','SerieController');

Route::resource('episode','EpisodeController');

Route::get('/', 'MainController@index')->name('home');

Route::get('/home', 'MainController@index')->name('home');

Route::get('/comment/store/{id}', 'CommentController@store')->name('comment.store');

Route::get('/comment/edit/{id}', 'CommentController@edit')->name('comment.edit');

Route::get('/comment/update/{id}/{validated}', 'CommentController@update')->name('comment.update');

Route::get('/comment/destroy/{id}', 'CommentController@destroy')->name('comment.destroy');

Route::get('/serie/{id}', 'CommentController@create')->name('comment.create');

Route::get('/episode','EpisodeController@show')->name('episode.show');

Route::get('/user','UserController@index')->name('user.index');

Route::get('/serie','SerieController@index')->name('serie.index');

Route::get('/deconnexion','UserController@deconnexion')->name('logout');