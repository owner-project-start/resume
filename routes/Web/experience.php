<?php
// return view
Route::get('experiences', 'ExperienceController@index')->name('experiences');

// get data
Route::get('getList', 'ExperienceController@all')->name('getList');
