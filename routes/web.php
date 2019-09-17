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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'InsertController@profile')->name('profile');
    Route::get('/experience', 'InsertController@insertExperience')->name('experience');
    Route::get('/education', 'InsertController@insertEducation')->name('education');
    Route::get('/interests', 'InsertController@insertInterest')->name('interests');
    Route::get('/certification', 'InsertController@insertCertification')->name('certification');
    Route::get('/skill', 'InsertController@insertSkill')->name('skill');
});
