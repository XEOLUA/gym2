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


Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newstype/{slug}', 'HomeController@newstype')->name('newstype');
Route::get('/news', 'HomeController@news')->name('news');
Route::get('/news/fetch_data', 'HomeController@newsaj')->name('newsaj');
Route::get('/newstype/{slug}/fetch_data', 'HomeController@newstypeaj')->name('newstypeaj');
Route::get('/new/{id}', 'HomeController@newsone')->name('newsone');
Route::get('/statistics', 'HomeController@statistics')->name('statistics');
Route::get('/page/{slug}', 'HomeController@page')->name('page');
Route::get('/mos/{slug}', 'HomeController@mospage')->name('mospage');
Route::get('/teachers/{id}', 'HomeController@teachers')->name('teachers');
Route::prefix('/teachers/page/')->group(function () {
    Route::get('{teacher_id}', 'HomeController@teacherspages')->name('teacherspages');
    Route::get('{teacher_id}/{page}', 'HomeController@teacherspages')->name('teacherspages');
});
Route::middleware(['auth'])->group(function () {
    Route::prefix('/arm/')->group(function () {
        Route::get('pupils', 'PupilController@pupilslist')->name('pupilslist');
        Route::get('pupils/fetchdata', 'PupilController@pupillistaj')->name('pupillistaj');
        Route::get('pupil/edit/{id}', 'PupilController@editpupil')->name('editpupil');
        Route::post('pupil/save', 'PupilController@savepupil')->name('savepupil');
    });
});

Auth::routes();
