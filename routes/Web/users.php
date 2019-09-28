<?php

Route::get('/profile', 'UserController@profile')->name('profile');
Route::put('/profile/update/{id}', 'UserController@updateProfile')->name('profile.update');
