<?php

Route::get('/', "OnepageController@home");
Route::post('subscribe', "OnepageController@subscribe")->name('subscribe');
Route::post('register', "OnepageController@register")->name('register');
