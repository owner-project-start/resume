<?php

Route::group(['prefix' => 'educations'], function () {
    Route::get('', 'EducationController@index')->name('educations');
    Route::get('getList', 'EducationController@all')->name('educations.getList');
    Route::post('getById', 'EducationController@getById')->name('educations.getById');
    Route::post('store', 'EducationController@store')->name('educations.store');
    Route::post('delete', 'EducationController@destroy')->name('educations.delete');
});
