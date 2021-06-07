<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->group(function () {
    Route::prefix('university')->group(function () {
        Route::post('add','Api\UniversityController@store');
        Route::post('update','Api\UniversityController@update');
        Route::post('delete','Api\UniversityController@delete');
        Route::get('list','Api\UniversityController@list');
    });

    Route::prefix('faculty')->group(function () {
        Route::post('add','Api\FacultyController@store');
        Route::post('update','Api\FacultyController@update');
        Route::post('delete','Api\FacultyController@delete');
        Route::get('list','Api\FacultyController@list');
    });

    Route::prefix('note')->group(function () {
        Route::post('add','Api\NoteController@store');
        Route::post('update','Api\NoteController@update');
        Route::post('delete','Api\NoteController@delete');
        Route::get('list','Api\NoteController@list');
    });
});
