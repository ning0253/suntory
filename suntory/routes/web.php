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
   Route::resource('liqueur', 'LiqueurController');//酒類管理
   Route::post('liqueur_upload_img','LiqueurController@liqueur_upload_img');//ajax 新增圖片
   Route::post('liqueur_delete_img','LiqueurController@liqueur_delete_img');//ajax 刪除圖片

   //酒類故事管理
   Route::resource('liqueurStory', 'LiqueurStoryController');
   Route::post('liqueurStory_upload_img','LiqueurStoryController@liqueurStory_upload_img');//axios上傳圖片
   Route::post('liqueurStory_delete_img','LiqueurStoryController@liqueurStory_delete_img');//axios刪除圖片
   Route::post('liqueurStory_kind','LiqueurStoryController@liqueurStory_kind');//獲得酒的種類


   Route::post('liqueurStory_text','LiqueurStoryController@liqueurStory_text');
});
