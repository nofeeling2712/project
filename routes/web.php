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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('homepage',function(){
// 	return view('item');
// });
 

Route::get('index/{channelId?}', 'ChannelsController@index')->name('index');

Route::get('item/{id}/edit','ItemsController@formUpdate')->name('edit');

Route::post('item/{id}/update','ItemsController@updateItem')->name('updateItem');

Route::get('item/{id}/delete','ItemsController@deleteItem')->name('delItem');

Route::get('item/create/{channelId}','ItemsController@create')->name('item/create');

Route::post('item/store','ItemsController@store')->name('store');

Route::get('postSearch','ItemsController@searchItem')->name('postSearch');

Route::get('test','UsersController@createRole');

Route::get('setRole','UsersController@setRole');

Route::get('checkRole','UsersController@checkRole');

Route::get('searchAjax','ChannelsController@searchAjax');