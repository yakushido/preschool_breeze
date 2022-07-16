<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AdminController;


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
// Users
Route::get('/', [ShopController::class, 'shops']);
Route::get('/search', [ShopController::class, 'search'])->name('shops.search');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('shops.detail');
Route::get('/login', [AuthController::class, 'loginShow']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerShow']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/done', [ReservationController::class, 'done']);
Route::get('/thanks', [AuthController::class, 'thanks']);
