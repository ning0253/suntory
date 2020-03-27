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
Route::get('/product_list', 'FrontController@product_list');

//購物車
Route::post('/addcart', 'cartcontroller@addcart');
Route::get('/getcontent', 'cartcontroller@getcontent');
Route::get('/totalcart', 'cartcontroller@totalcart');


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('liqueur', 'LiqueurController'); //酒類管理
    Route::post('liqueur_upload_img', 'LiqueurController@liqueur_upload_img'); //ajax 新增圖片
    Route::post('liqueur_delete_img', 'LiqueurController@liqueur_delete_img'); //ajax 刪除圖片

    //酒類故事管理
    Route::resource('liqueurStory', 'LiqueurStoryController');
    Route::post('liqueurStory_upload_img', 'LiqueurStoryController@liqueurStory_upload_img'); //axios上傳圖片
    Route::post('liqueurStory_delete_img', 'LiqueurStoryController@liqueurStory_delete_img'); //axios刪除圖片
    Route::post('liqueurStory_kind', 'LiqueurStoryController@liqueurStory_kind'); //獲得酒的種類

    Route::post('liqueurStory_text', 'LiqueurStoryController@liqueurStory_text');

    //酒類產品管理
    Route::resource('liqueurProduct', 'LiqueurProductController');
    Route::post('liqueurProduct_upload_img', 'LiqueurProductController@liqueurProduct_upload_img'); //axios上傳圖片
    Route::post('liqueurProduct_delete_img', 'LiqueurProductController@liqueurProduct_delete_img'); //axios刪除圖片
    Route::post('liqueurProduct_kind', 'LiqueurProductController@liqueurProduct_kind'); //獲得酒的種類
    Route::post('liqueurProduct_text', 'LiqueurProductController@liqueurProduct_text'); //獲得酒的產品資料

    //酒類態度
    Route::resource('liqueurAttitude', 'liqueurAttitudeController');
    Route::post('liqueurAttitude_upload_img', 'liqueurAttitudeController@liqueurAttitude_upload_img'); //axios上傳圖片
    Route::post('liqueurAttitude_delete_img', 'liqueurAttitudeController@liqueurAttitude_delete_img'); //axios刪除圖片
    Route::post('liqueurAttitude_kind', 'liqueurAttitudeController@liqueurAttitude_kind'); //獲得酒的種類
    Route::post('liqueurAttitude_text', 'liqueurAttitudeController@liqueurAttitude_text'); //獲得酒的態度資料

    //酒類肯定
    Route::resource('liqueurSure', 'liqueurSureController');
    Route::post('liqueurSure_upload_img', 'liqueurSureController@liqueurSure_upload_img'); //axios上傳圖片
    Route::post('liqueurSure_delete_img', 'liqueurSureController@liqueurSure_delete_img'); //axios刪除圖片
    Route::post('liqueurSure_product', 'liqueurSureController@liqueurSure_product'); //獲得酒的產品
    Route::post('liqueurSure_text', 'liqueurSureController@liqueurSure_text'); //獲得酒的獎項資料

    //酒類蒸餾場
    Route::resource('liqueurMethod', 'liqueurMethodController');
    Route::post('liqueurMethod_upload_img', 'liqueurMethodController@liqueurMethod_upload_img'); //axios上傳圖片
    Route::post('liqueurMethod_delete_img', 'liqueurMethodController@liqueurMethod_delete_img'); //axios刪除圖片
    Route::post('liqueurMethod_kind', 'liqueurMethodController@liqueurMethod_kind'); //獲得酒的種類
    Route::post('liqueurMethod_text', 'liqueurMethodController@liqueurMethod_text'); //獲得酒的態度資料

    //販售地點
    Route::resource('shop', 'shopController');
    Route::post('shop_upload_img', 'shopController@shop_upload_img'); //axios上傳圖片
    Route::post('shop_delete_img', 'shopController@shop_delete_img'); //axios刪除圖片
    Route::post('shop_text', 'shopController@shop_text'); //獲得販售地點資料

    //訂單
    Route::resource('order', 'orderController');
    Route::post('order_upload_img', 'orderController@order_upload_img'); //axios上傳圖片
    Route::post('order_delete_img', 'orderController@order_delete_img'); //axios刪除圖片
    Route::post('order_kind', 'orderController@order_kind'); //獲得酒的種類
    Route::post('order_text', 'orderController@order_text'); //獲得訂單資料
});
