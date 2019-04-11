<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('flowchart');
});
Route::post('/flowchart/insert','flowchartController@index')->name('flowchart.insert');
Route::get('/convert','flowchartController@convert')->name('flowchart.convert');