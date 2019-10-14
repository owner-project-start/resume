<?php
Route::group(['prefix' => 'experiences'], function () {
    Route::get('', 'ExperienceController@index')->name('experiences');
    Route::get('getList', 'ExperienceController@all')->name('experiences.getList');
    Route::post('getById', 'ExperienceController@getById')->name('experiences.getById');
    Route::post('store', 'ExperienceController@store')->name('experiences.store');
});
