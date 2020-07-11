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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {

//pertanyaan
Route::get('/pertanyaan/{id}', 'PertanyaanController@show');
Route::get('/tambahpertanyaan', 'PertanyaanController@create');
Route::post('/pertanyaan', 'PertanyaanController@store');
Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');
Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
Route::delete('pertanyaan/{id}', 'PertanyaanController@destroy');
Route::put('/pertanyaan-up-vote/{id}','PertanyaanController@upvote');
Route::put('/pertanyaan-down-vote/{id}','PertanyaanController@downvote');

//jawaban
Route::put('/jawaban-up-vote/{id}','JawabanController@upvote');
Route::put('/jawaban-down-vote/{id}','JawabanController@downvote');
Route::put('/jawaban-resolved/{id}','JawabanController@resolved');
});

Route::get('/pertanyaan', 'PertanyaanController@index');
