<?php




Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('login','LoginController@index')->name('admin.login');

    Route::post('login','LoginController@login')->name('admin.login');

    Route::get('user','UserController@index')->name('admin.user.index');

    Route::get('user/create','UserController@create')->name('admin.user.create');

    Route::post('user/create','UserController@store')->name('admin.user.create');

    Route::get('user/update/{id}','UserController@update')->name('admin.user.update')->where(['id'=>'\d+']);

    Route::put('user/update/{id}','UserController@')->name('admin.user.update')->where(['id'=>'\d+']);

    Route::delete('user/update/{id}','UserController@del')->name('admin.user.del')->where(['id'=>'\d+']);

    Route::delete('user/update/{id?}','UserController@deldel')->name('admin.user.deldel')->where(['id'=>'\d+']);
});