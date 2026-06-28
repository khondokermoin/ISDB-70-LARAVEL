<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// ডিফল্ট ড্যাশবোর্ড (Smart Redirect সহ)
// ==========================================
Route::get('/dashboard', function () {

    $role = auth()->user()->role;

    // অ্যাডমিন বা স্টাফ ভুল করে এই লিংকে আসলে তাদের নিজস্ব ড্যাশবোর্ডে পাঠিয়ে দেবে
    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'staff') {
        return redirect()->route('staff.dashboard');
    }

    // শুধুমাত্র কাস্টমার হলে এই পেজটি দেখতে পাবে
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// প্রোফাইল ম্যানেজমেন্ট (সবার জন্য উন্মুক্ত, তবে লগিন থাকতে হবে)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==========================================
// Admin Routes (শুধুমাত্র admin ঢুকতে পারবে)
// ==========================================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // অ্যাডমিনের অন্যান্য রাউটগুলো পরবর্তীতে এখানেই যুক্ত করবেন
});

// ==========================================
// Staff Routes (শুধুমাত্র staff ঢুকতে পারবে)
// ==========================================
Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');

    // স্টাফদের অন্যান্য রাউটগুলো পরবর্তীতে এখানেই যুক্ত করবেন
});

require __DIR__ . '/auth.php';
