<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;



//ログイン機能

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ユーザー関連機能

//マイページ
Route::get('/my_page', [UserController::class, 'my_page'])->middleware('auth'); 
Route::get('/my_page/cancel/id={id}', [UserController::class, 'cancel']);
//会員登録完了ページ
Route::get('/thanks', [UserController::class, 'thanks'])->middleware('auth'); 


//レストラン関連機能

//飲食店一覧
Route::get('/', [RestaurantController::class, 'index']); 
//店詳細
Route::get('/shop_detail/id={id}', [RestaurantController::class, 'shop_detail_get']); 
Route::post('/shop_detail/id={id}', [RestaurantController::class, 'shop_detail_post']);
//予約完了表示ページ
Route::post('/done', [RestaurantController::class, 'done']); 

//お気に入り機能関連

Route::post('/favorite', [UserController::class, 'favorite']);











