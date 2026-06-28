<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// ==========================================
// পাবলিক ফ্রন্টেন্ড রাউটস
// ==========================================
Route::get('/',              [FrontendController::class, 'index'])->name('home');
Route::get('/home-internet', [FrontendController::class, 'homeInternet'])->name('home.internet');
Route::get('/corporate',     [FrontendController::class, 'corporate'])->name('corporate');
Route::get('/coverage',      [FrontendController::class, 'coverage'])->name('coverage');
Route::get('/iptsp',         [FrontendController::class, 'iptsp'])->name('iptsp');
Route::get('/hosting',       [FrontendController::class, 'hosting'])->name('hosting');
Route::get('/support',       [FrontendController::class, 'support'])->name('support');

// অর্ডার রাউট
Route::get('/order/{id}',   [FrontendController::class, 'order'])->name('order.create');

// ==========================================
// ড্যাশবোর্ড (Smart Redirect)
// ==========================================
Route::get('/dashboard', function () {
    $role = strtolower((string) auth()->user()->role);

    if ($role === 'admin')    return redirect()->route('admin.dashboard');
    if ($role === 'staff')    return redirect()->route('staff.dashboard');
    if ($role === 'customer') return view('customer.dashboard');

    abort(403, 'আপনার অ্যাকাউন্টে কোনো বৈধ রোল নেই।');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==========================================
// প্রোফাইল
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==========================================
// Admin Routes
// ==========================================
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });

// ==========================================
// Staff Routes
// ==========================================
Route::middleware(['auth', 'verified', 'role:admin,staff'])
    ->prefix('staff')
    ->name('staff.')
    ->group(function () {
        Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
    });

require __DIR__ . '/auth.php';
