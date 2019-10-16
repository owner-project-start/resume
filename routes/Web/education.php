<?php

Route::group(['prefix' => 'education'], function () {
    Route::get('', 'EducationController@index')->name('education');
    Route::get('getList', 'EducationController@all')->name('education.getList');
    Route::post('getById', 'EducationController@getById')->name('education.getById');
    Route::post('store', 'EducationController@store')->name('education.store');
    Route::post('delete', 'EducationController@destroy')->name('education.delete');
});
