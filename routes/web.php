<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', 'HomeController@index')->name('index');

Route::group(['middleware' => 'auth'], function () {
    require __DIR__ . '/Web/users.php';
    require __DIR__ . '/Web/experience.php';
    require __DIR__ . '/Web/education.php';
    require __DIR__ . '/Web/skill.php';
    require __DIR__ . '/Web/interest.php';
    require __DIR__ . '/Web/certificate.php';
    require __DIR__ . '/Web/social.php';
});
