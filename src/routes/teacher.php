<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\teacher\Auth\AuthenticatedSessionController;
use App\Http\Controllers\teacher\Auth\ConfirmablePasswordController;
use App\Http\Controllers\teacher\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\teacher\Auth\EmailVerificationPromptController;
use App\Http\Controllers\teacher\Auth\NewPasswordController;
use App\Http\Controllers\teacher\Auth\PasswordResetLinkController;
use App\Http\Controllers\teacher\Auth\RegisteredUserController;
use App\Http\Controllers\teacher\Auth\VerifyEmailController;
use App\Http\Controllers\teacher\DashboardController;
use App\Http\Controllers\teacher\AttendanceController;
use App\Http\Controllers\teacher\MailController;

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware('auth:teachers')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/register', [RegisteredUserController::class, 'create'])
  ->middleware('guest')
  ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
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
  ->middleware('auth:teachers')
  ->name('logout');


// ?????????(Teacher)
Route::group(['middleware' => 'auth:teachers'], function () {
  Route::post('/attendance/add', [AttendanceController::class, 'add'])->name('attendance.add');
  Route::post('/attendance/delete/{id}', [AttendanceController::class, 'delete'])->name('attendance.delete');
  Route::post('/attendance/update/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
  Route::get('/detail/{id}', [DashboardController::class,'detail'])->name('detail');
  Route::get('/mail',[MailController::class,'index']);
  Route::post('/mail/confirm', [MailController::class,'confirm']);
  Route::post('/mail/send', [MailController::class,'send']);
});

