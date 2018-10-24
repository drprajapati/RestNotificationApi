<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List notices
Route::get('notices','NoticeController@index');

//List single notice
Route::get('notices/{id}','NoticeController@show');

Route::get('notices/search/{title}','NoticeController@searchGetResult');
//Create a new notice
Route::post('notices','NoticeController@store');

//Update a notice
Route::put('notices','NoticeController@show');

//Delete a notice
Route::delete('notices','NoticeController@destroy');
