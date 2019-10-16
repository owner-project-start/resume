<?php

Route::group(['prefix' => 'skills'], function () {
    Route::get('', 'SkillController@index')->name('skills');
    Route::get('getList', 'SkillController@all')->name('skills.getList');
    Route::post('getById', 'SkillController@getById')->name('skills.getById');
    Route::post('store', 'SkillController@store')->name('skills.store');
    Route::post('delete', 'SkillController@destroy')->name('skills.delete');
});
