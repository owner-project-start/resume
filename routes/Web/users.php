<?php

Route::get('/profile', 'UserController@profile')->name('profile');
Route::put('/profile/update/{id}', 'UserController@updateProfile')->name('profile.update');
Route::put('/avatar/update/{id}', 'UserController@updateAvatar')->name('avatar.update');
