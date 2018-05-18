<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/task', 'TaskController');
Route::group(['prefix' => 'task'], function (){
    Route::apiResource('/{task}reviews', 'ReviewController');
});

