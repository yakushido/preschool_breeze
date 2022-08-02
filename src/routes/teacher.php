<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Teacher\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Teacher\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Teacher\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Teacher\Auth\NewPasswordController;
use App\Http\Controllers\Teacher\Auth\PasswordResetLinkController;
use App\Http\Controllers\Teacher\Auth\RegisteredUserController;
use App\Http\Controllers\Teacher\Auth\VerifyEmailController;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\DetailController;
use App\Http\Controllers\Teacher\MailController;

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware('auth:teachers', 'verified')->group(function () {
  
  //マイページ 
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::post('/search',[DashboardController::class,'search'])->name('search');
  
  // 出欠
  Route::post('/attendance/update',[AttendanceController::class,'update'])->name('attendance.update');
  Route::post('/attendance/delete',[AttendanceController::class,'delete'])->name('attendance.delete');

  // 詳細
  Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail.index');
  Route::get('/detail/update/{id}',[DetailController::class,'update_show'])->name('detail.update.show');
  Route::post('/deteil/update/{id}',[DetailController::class,'update'])->name('detail.update');
  Route::post('/detail/delete/{id}' ,[DetailController::class, 'delete'])->name('detail.delete');
});

Route::post('/register', [RegisteredUserController::class, 'store'])
  ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create']);

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
  ->middleware('auth:teachers')
  ->name('logout');


// 要認証(Teacher)
Route::group(['middleware' => 'auth:teachers'], function () {
  Route::post('/attendance/add', [AttendanceController::class, 'add'])->name('attendance.add');
  Route::post('/attendance/delete/{id}', [AttendanceController::class, 'delete'])->name('attendance.delete');
  Route::get('/attendance/update/{id}', [AttendanceController::class, 'update_show']);
  Route::post('/attendance/update/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
  
  Route::get('/mail',[MailController::class,'index']);
  Route::post('/mail/confirm', [MailController::class,'confirm'])->name('mail.confirm');
  Route::post('/mail/send', [MailController::class,'send']);
});

