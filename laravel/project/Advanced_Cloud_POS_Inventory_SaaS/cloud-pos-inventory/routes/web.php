<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;

// Super Admin Controllers
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboard;
use App\Http\Controllers\SuperAdmin\CompanyController;
use App\Http\Controllers\SuperAdmin\PlanController;
use App\Http\Controllers\SuperAdmin\SubscriptionController;
use App\Http\Controllers\SuperAdmin\TransactionController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\SettingController;
use App\Http\Controllers\SuperAdmin\SystemController;

// Company & Branch Controllers
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
        
        // SaaS Management (Sidebar Links)
        Route::resource('/companies', CompanyController::class);
        Route::resource('/plans', PlanController::class);
        Route::resource('/subscriptions', SubscriptionController::class)->only(['index', 'show']);
        Route::resource('/transactions', TransactionController::class)->only(['index']);
        
        // Platform Administration
        Route::resource('/users', UserController::class);
        Route::resource('/roles', RoleController::class);
        
        // Global Settings
        Route::prefix('settings')->name('settings.')->group(function() {
            Route::get('/general', [SettingController::class, 'general'])->name('general');
            Route::get('/payment', [SettingController::class, 'payment'])->name('payment');
            Route::get('/email', [SettingController::class, 'email'])->name('email');
        });
        
        // System & Security
        Route::prefix('system')->name('system.')->group(function() {
            Route::get('/logs', [SystemController::class, 'logs'])->name('logs');
            Route::get('/backup', [SystemController::class, 'backup'])->name('backup');
            Route::get('/info', [SystemController::class, 'info'])->name('info');
        });
    });

// ==========================================
// 2. Company Admin Routes (Shop Owner)
// ==========================================
Route::middleware(['auth', 'verified', 'role:Company Admin'])
    ->prefix('company')
    ->name('company.')
    ->group(function () {
        Route::get('/dashboard', [CompanyDashboard::class, 'index'])->name('dashboard');
        // পরবর্তীতে এখানে Company Admin এর Inventory, POS, Sales এর রুটগুলো যুক্ত করবেন
    });

// ==========================================
// 3. Branch Routes (Manager / Salesman)
// ==========================================
Route::middleware(['auth', 'verified', 'role:Manager|Salesman'])
    ->prefix('branch')
    ->name('branch.')
    ->group(function () {
        Route::get('/dashboard', [BranchDashboard::class, 'index'])->name('dashboard');
        // পরবর্তীতে এখানে Branch এর POS, Sales এর রুটগুলো যুক্ত করবেন
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

        // ইউজার যদি ভুল করে /dashboard এ চলে আসে, তাকে তার সঠিক ড্যাশবোর্ডে পাঠিয়ে দাও
        if ($user->hasRole('Super Admin')) return redirect()->route('superadmin.dashboard');
        if ($user->hasRole('Company Admin')) return redirect()->route('company.dashboard');
        if ($user->hasRole('Manager') || $user->hasRole('Salesman')) return redirect()->route('branch.dashboard');

        // যদি কারো কোনো রোলই না থাকে, তাকে 403 Error দেখাও
        abort(403, 'You are logged in, but you don\'t have any specific SaaS role assigned yet! Please contact the Super Admin.');
    })->name('dashboard');
});

require __DIR__.'/auth.php';