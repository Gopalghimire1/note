<?php

use App\Helper;
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

Route::match(['GET','POST'],'/login', 'Admin\AuthController@login')->name('login');
Route::match(['GET','POST'],'/register', 'Admin\AuthController@register')->name('register');
Route::match(['GET','POST'],'/logout', 'Admin\AuthController@logout')->name('logout');
 // faculties load by university id
 Route::post('faculties-load','Admin\AuthController@facultyLoad')->name('faculty.load');




Route::group([ 'middleware' => 'role:student'],function () {
    Route::get('/', 'HomeController@homePage')->name('student.home');

    Route::prefix('note')->name('note.')->group(function () {
       Route::get('/', 'User\NoteController@index')->name('index');
       Route::post('/add', 'User\NoteController@add')->name('add');
       Route::get('/list','User\NoteController@listByUser')->name('list.by.user');
       Route::get('/update/{id}','User\NoteController@edit')->name('edit');
       Route::post('/update/{id}','User\NoteController@update')->name('update');
       Route::get('/delete/{id}','User\NoteController@delete')->name('delete');
       Route::get('/all-list','User\NoteController@list')->name('list');
       Route::match(['GET','POST'],'/search','User\NoteController@search')->name('search');


    });
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('','Admin\AdminController@index')->name('dashboard');
    Route::prefix('university')->name('university.')->group(function () {
        Route::get('','Admin\UniversityController@index')->name('index');
        Route::post('add','Admin\UniversityController@store')->name('store');
        Route::post('update','Admin\UniversityController@update')->name('update');
    });
});

