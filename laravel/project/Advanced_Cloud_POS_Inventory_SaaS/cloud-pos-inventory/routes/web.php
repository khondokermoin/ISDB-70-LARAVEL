<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// =====================================
// ১. সাধারণ ইউজারের রাউট 
// =====================================
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // সাধারণ ইউজার তার নরমাল ড্যাশবোর্ড দেখবে
    })->name('dashboard');
});


// =====================================
// ২. অ্যাডমিনের রাউট 
// =====================================
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return "Welcome Boss! This is Admin Dashboard"; // পরে এখানে আপনার অ্যাডমিন প্যানেলের ভিউ বসাবেন
    })->name('dashboard');
});


// =====================================
// ৩. প্রোফাইল রাউট (সবার জন্য)
// =====================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';