<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;

Route::resource('/student', StudentController::class);
Route::resource('/product', ProductController::class);
Route::post('/product/create', [ProductController::class, 'create']);

Route::get('notification', [NotificationController::class, 'index']);
Route::get('notification/{type}', [NotificationController::class, 'notification'])->name("notification");