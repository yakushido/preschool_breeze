<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\AttendanceController;

use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\Auth\ConfirmablePasswordController;
use App\Http\Controllers\User\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\User\Auth\EmailVerificationPromptController;
use App\Http\Controllers\User\Auth\NewPasswordController;
use App\Http\Controllers\User\Auth\PasswordResetLinkController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\User\Auth\VerifyEmailController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\PaymentsController;
use App\Http\Controllers\User\BlogController;
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

//トップページ
Route::get('/', [HomeController::class,'home'])->name('home');

// ブログ
Route::get('/blog/{id}', [BlogController::class, 'show']);

Route::middleware('auth:users', 'verified')->group(function () {
  // マイページ
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  // 欠席連絡
  Route::get('/attendance', [AttendanceController::class, 'show'])->name('attendance');
  Route::post('/attendance/add', [AttendanceController::class, 'add'])->name('attendance.add');
  Route::get('/attendance/done', [AttendanceController::class, 'done'])->name('attendance.done');

  // 制服販売
  Route::get('/shop', [ShopController::class,'index']);
  Route::post('/shop/cart', [ShopController::class,'show'])->name('shop.cart');
  Route::post('/shop/add', [ShopController::class,'add'])->name('shop.add');

  // 決済
  Route::post('/payment', [PaymentsController::class,'payment'])->name('payment');
  Route::get('/complete', [PaymentsController::class,'complete'])->name('complete');
});

Route::get('user/register', [RegisteredUserController::class, 'create'])
  ->middleware('guest')
  ->name('register.show');

Route::post('/register', [RegisteredUserController::class, 'store'])
  ->middleware('guest')
  ->name('register');

Route::get('/user/login', [AuthenticatedSessionController::class, 'create'])
  ->middleware('guest');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
  ->middleware('guest')
  ->name('login');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
  ->middleware('guest')
  ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
  ->middleware('guest')
  ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
  ->middleware('guest')
  ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
  ->middleware('guest')
  ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
  ->middleware('auth')
  ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
  ->middleware(['auth', 'signed', 'throttle:6,1'])
  ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
  ->middleware(['auth', 'throttle:6,1'])
  ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
  ->middleware('auth')
  ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
  ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
  ->middleware('auth:users')
  ->name('logout');


