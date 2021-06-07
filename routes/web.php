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

Route::get('/', function () {
    echo Helper::getFilePath(1);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('','Admin\AdminController@index')->name('dashboard');


    Route::prefix('university')->name('university.')->group(function () {
        Route::get('','Admin\UniversityController@index')->name('index');
        Route::post('add','Admin\UniversityController@store')->name('store');
        Route::post('update','Admin\UniversityController@update')->name('update');
    });
});

