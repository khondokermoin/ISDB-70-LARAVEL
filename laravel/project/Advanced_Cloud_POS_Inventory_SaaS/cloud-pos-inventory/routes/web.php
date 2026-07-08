<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboard;
use App\Http\Controllers\Company\DashboardController as CompanyDashboard;
use App\Http\Controllers\Branch\DashboardController as BranchDashboard;

Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// 1. Super Admin Routes (SaaS Owner)
// ==========================================
Route::middleware(['auth', 'verified', 'role:Super Admin'])
    ->prefix('super-admin')
    ->name('superadmin.')
    ->group(function () {
        Route::get('/dashboard', [SuperAdminDashboard::class, 'index'])->name('dashboard');
    });

// ==========================================
// 2. Company Admin Routes (Shop Owner)
// ==========================================
Route::middleware(['auth', 'verified', 'role:Company Admin'])
    ->prefix('company')
    ->name('company.')
    ->group(function () {
        Route::get('/dashboard', [CompanyDashboard::class, 'index'])->name('dashboard');
    });

// ==========================================
// 3. Branch Routes (Manager / Salesman)
// ==========================================
Route::middleware(['auth', 'verified', 'role:Manager|Salesman'])
    ->prefix('branch')
    ->name('branch.')
    ->group(function () {
        Route::get('/dashboard', [BranchDashboard::class, 'index'])->name('dashboard');
    });

// ==========================================
// 4. Global Auth Routes (Profile)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==========================================
// 5. Smart Fallback Dashboard (Traffic Controller)
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function (Request $request) {
        $user = $request->user();

        // ইউজার যদি ভুল করে /dashboard এ চলে আসে, তাকে তার সঠিক ড্যাশবোর্ডে পাঠিয়ে দাও
        if ($user->hasRole('Super Admin')) return redirect()->route('superadmin.dashboard');
        if ($user->hasRole('Company Admin')) return redirect()->route('company.dashboard');
        if ($user->hasRole('Manager') || $user->hasRole('Salesman')) return redirect()->route('branch.dashboard');

        // যদি কারো কোনো রোলই না থাকে
        return "You are logged in, but you don't have any specific SaaS role assigned yet! Please contact admin.";
    })->name('dashboard');
});

require __DIR__.'/auth.php';