<?php

Route::group(['prefix' => 'interests'], function () {
    Route::get('', 'InterestController@index')->name('interests');
    Route::get('getList', 'InterestController@all')->name('interests.getList');
    Route::post('getById', 'InterestController@getById')->name('interests.getById');
    Route::post('store', 'InterestController@store')->name('interests.store');
    Route::post('delete', 'InterestController@destroy')->name('interests.delete');
});
