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

Route::get('proba',function (){return view('proba');} );

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
Route::get('/statistics/olymp/', 'HomeController@statisticsolymp')->name('statisticsolymp');
Route::get('/classes/{class_id?}/', 'HomeController@classes')->name('classes');

Route::prefix('/teachers/page/')->group(function () {
    Route::get('{teacher_id}', 'HomeController@teacherspages')->name('teacherspages');
    Route::get('{teacher_id}/{page}', 'HomeController@teacherspages')->name('teacherspages');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('/arm/')->group(function () {
        Route::get('pupils', 'PupilController@pupilslist')->name('pupilslist');
        Route::get('pupils/fetchdata', 'PupilController@pupillistaj')->name('pupillistaj');
        Route::get('pupil/edit/{id}', 'PupilController@editpupil')->name('editpupil');
        Route::get('pupil/print/{id}', 'PupilController@printpupil')->name('printpupil');
        Route::post('pupil/save', 'PupilController@savepupil')->name('savepupil');

        Route::get('profile/{page_id?}', 'TeacherController@index');
        Route::get('profile/page/{page_id}/{direct}', 'TeacherController@pageorder');
        Route::get('profile/teacherpage/edit/{page_id}', 'TeacherController@getpageinfo');
        Route::post('profile/teacherpage/save', 'TeacherController@saveteacherpage')->name('saveteacherpage');
        Route::post('profile/teacherpage/delete', 'TeacherController@deleteteacherpage')->name('deleteteacherpage');
        Route::get('profile/teacher/private/{teacher_id}', 'TeacherController@getteacherinfo')->name('getteacherinfo');
        Route::post('profile/teacher/privatsave', 'TeacherController@saveteacherinfo')->name('saveteacherinfo');
    });
});

Auth::routes();
