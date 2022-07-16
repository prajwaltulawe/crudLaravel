<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('show','App\Http\Controllers\TodoLaravelController@show');
route::get('delete/{id}','App\Http\Controllers\TodoLaravelController@destroy');
route::post('add','App\Http\Controllers\TodoLaravelController@store');
route::post('update','App\Http\Controllers\TodoLaravelController@update');
