<?php

Route::group(['prefix' => 'socials'], function () {
    Route::get('', 'SocialController@index')->name('socials');
    Route::get('getList', 'SocialController@all')->name('socials.getList');
    Route::post('getById', 'SocialController@getById')->name('socials.getById');
    Route::post('store', 'SocialController@store')->name('socials.store');
    Route::post('delete', 'SocialController@destroy')->name('socials.delete');
});
