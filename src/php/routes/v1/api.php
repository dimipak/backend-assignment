<?php


use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['throttle:ip_address', 'content_type']], function() {

    Route::get('/get', 'VesselsController@getVessels')->name('vessels.get');
});
