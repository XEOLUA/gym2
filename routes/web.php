<?php

use App\Navigation;
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

Route::get('/', 'HomeController@index')->name('index');
//View::composer('home.header', function($view)
//{
//
//    $view->with('nav', Navigation::where('block_id',1)->where('active',1)->orderBy('order')->get());
//
//});

Auth::routes();
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/news', 'HomeController@news')->name('news');
Route::get('/page/{slug}', 'HomeController@page')->name('page');
