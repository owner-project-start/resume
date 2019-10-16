<?php

Route::group(['prefix' => 'certificaties'], function () {
    Route::get('', 'CertificateController@index')->name('certificaties');
    Route::get('getList', 'CertificateController@all')->name('certificaties.getList');
    Route::post('getById', 'CertificateController@getById')->name('certificaties.getById');
    Route::post('store', 'CertificateController@store')->name('certificaties.store');
    Route::post('delete', 'CertificateController@destroy')->name('certificaties.delete');
});
