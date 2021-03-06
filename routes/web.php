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

Route::get('/erd', function () {
    return view('erd');
});
Route::get('/tentang-kami', function () {
    return view('aboutus');
});

//pertanyaan
Route::get('/pertanyaan/{id}/{slug}', 'PertanyaanController@show');
Route::get('/tambahpertanyaan', 'PertanyaanController@create');
Route::post('/pertanyaan', 'PertanyaanController@store');
Route::get('/pertanyaan/{id}/edit/{slug}', 'PertanyaanController@edit');
Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
Route::get('/pertanyaan/cari', 'PertanyaanController@cari');
Route::delete('pertanyaan/{id}', 'PertanyaanController@destroy');
Route::put('/pertanyaan-up-vote/{id}','PertanyaanController@upvote');
Route::put('/pertanyaan-down-vote/{id}','PertanyaanController@downvote');

//jawaban
Route::post('/jawaban/{pertanyaan_id}', 'JawabanController@store');
Route::put('/jawaban-up-vote/{id}','JawabanController@upvote');
Route::put('/jawaban-down-vote/{id}','JawabanController@downvote');
Route::put('/jawaban-resolved/{id}','JawabanController@resolved');
Route::get('/jawaban/{id}/edit', 'JawabanController@edit');
Route::put('/jawaban/{id}', 'JawabanController@update');
Route::put('/jawaban-load-form/{id}', 'JawabanController@generate_form_jawaban');
Route::delete('/jawaban/{id}', 'JawabanController@destroy');

//komentar
Route::post('/pertanyaan-komentar/{pertanyaan_id}', 'PertanyaanController@store_komentar');
Route::post('/jawaban-komentar/{pertanyaan_id}', 'JawabanController@store_komentar');
});

Route::get('/pertanyaan', 'PertanyaanController@index');
