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

Route::get('/admin', 'HomeController@index')->name('admin');


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
   Route::resource('liqueur', 'LiqueurController');
   Route::post('liqueur_upload_img','LiqueurController@liqueur_upload_img');//ajax 新增圖片
   Route::post('liqueur_delete_img','LiqueurController@liqueur_delete_img');//ajax 刪除圖片
   
});
