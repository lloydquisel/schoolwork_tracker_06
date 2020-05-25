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
    return view('landing');
});

Route::get('/subjects', 'SubjectController@index')->name('subjects.index');
Route::post('/subjects', 'SubjectController@store')->name('subjects.store');
Route::get('/subjects/{id}', 'SubjectController@show')->name('subjects.show');
Route::delete('/subjects/{id}', 'SubjectController@destroy')->name('subjects.destroy');
Route::patch('/subjects/{id}', 'SubjectController@update')->name('subjects.update');

Route::get('/schoolworks', 'SchoolworkController@index')->name('schoolworks.index');
Route::post('/schoolworks', 'SchoolworkController@store')->name('schoolworks.store');
Route::delete('/schoolworks/{id}', 'SchoolworkController@destroy')->name('schoolworks.destroy');
Route::patch('/schoolworks/{id}', 'SchoolworkController@update')->name('schoolworks.update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
