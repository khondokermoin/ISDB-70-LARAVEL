<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;

// ==========================================
// Super Admin Controllers
// ==========================================
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboard;
use App\Http\Controllers\SuperAdmin\CompanyController;
use App\Http\Controllers\SuperAdmin\PlanController;
use App\Http\Controllers\SuperAdmin\SubscriptionController;
use App\Http\Controllers\SuperAdmin\TransactionController;
use App\Http\Controllers\SuperAdmin\UserController as SuperAdminUserController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\SettingController;
use App\Http\Controllers\SuperAdmin\SystemController;

// Super Admin Controllers (master data / modules)
use App\Http\Controllers\SuperAdmin\BusinessTypeController;
use App\Http\Controllers\SuperAdmin\BusinessModuleController;
use App\Http\Controllers\SuperAdmin\GlobalCategoryController;
use App\Http\Controllers\SuperAdmin\GlobalUnitController;
use App\Http\Controllers\SuperAdmin\GlobalTaxController;
use App\Http\Controllers\SuperAdmin\GlobalAttributeController;
use App\Http\Controllers\SuperAdmin\InvoiceTemplateController;
use App\Http\Controllers\SuperAdmin\BarcodeSettingController;
use App\Http\Controllers\SuperAdmin\EmailTemplateController;
use App\Http\Controllers\SuperAdmin\AddonController;
use App\Http\Controllers\SuperAdmin\AddonMarketplaceController;
use App\Http\Controllers\SuperAdmin\SupportTicketController;
use App\Http\Controllers\SuperAdmin\AnnouncementController;
use App\Http\Controllers\SuperAdmin\ImpersonateController;
use App\Http\Controllers\SuperAdmin\ReportController as SuperAdminReportController;

// ==========================================
// Company Controllers
// ==========================================
use App\Http\Controllers\Company\DashboardController as CompanyDashboard;
use App\Http\Controllers\Company\BranchController;
use App\Http\Controllers\Company\UserController as CompanyUserController;
use App\Http\Controllers\Company\ProductController;
use App\Http\Controllers\Company\CategoryController;
use App\Http\Controllers\Company\PurchaseController;
use App\Http\Controllers\Company\CustomerController;
use App\Http\Controllers\Company\SupplierController;
use App\Http\Controllers\Company\ExpenseController;
use App\Http\Controllers\Company\ReportController as CompanyReportController;

// Company Controllers added based on Sidebar requirements
use App\Http\Controllers\Company\SaleController as CompanySaleController;
use App\Http\Controllers\Company\InventoryController as CompanyInventoryController;
use App\Http\Controllers\Company\CompanySettingController;
use App\Http\Controllers\Company\SubscriptionController as CompanySubscriptionController;
use App\Http\Controllers\Company\AnnouncementController as CompanyAnnouncementController;

// ==========================================
// Branch Controllers
// ==========================================
use App\Http\Controllers\Branch\DashboardController as BranchDashboard;
use App\Http\Controllers\Branch\InventoryController;
use App\Http\Controllers\Branch\PosController;
use App\Http\Controllers\Branch\SaleController;
use App\Http\Controllers\Branch\StockAdjustmentController;

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

        // SaaS Management
        Route::resource('/companies', CompanyController::class);
        Route::get('/companies/{company}/impersonate', [ImpersonateController::class, 'impersonate'])->name('companies.impersonate');
        Route::resource('/plans', PlanController::class);
        Route::resource('/transactions', TransactionController::class)->only(['index']);

        // Subscription Routes
        Route::resource('subscriptions', SubscriptionController::class)->only(['index', 'show']);
        Route::post('subscriptions/{subscription}/cancel', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
        Route::post('subscriptions/{subscription}/suspend', [SubscriptionController::class, 'suspend'])->name('subscriptions.suspend');
        Route::post('subscriptions/{subscription}/reactivate', [SubscriptionController::class, 'reactivate'])->name('subscriptions.reactivate');
        Route::post('subscriptions/{subscription}/extend', [SubscriptionController::class, 'extend'])->name('subscriptions.extend');

        // Platform Administration
        Route::resource('users', SuperAdminUserController::class)->except(['show']);
        Route::resource('roles', RoleController::class)->except(['show']);

        // Global Settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/general', [SettingController::class, 'general'])->name('general');
            Route::post('/general', [SettingController::class, 'update'])->name('general.update'); 

            Route::get('/payment', [SettingController::class, 'payment'])->name('payment');
            Route::post('/payment', [SettingController::class, 'update'])->name('payment.update');

            Route::get('/email', [SettingController::class, 'email'])->name('email');
            Route::post('/email', [SettingController::class, 'update'])->name('email.update');
        });

        // System & Security
        Route::prefix('system')->name('system.')->group(function () {
            Route::get('/logs', [SystemController::class, 'logs'])->name('logs');
            Route::get('/backup', [SystemController::class, 'backup'])->name('backup');
            Route::get('/info', [SystemController::class, 'info'])->name('info');
        });

        // Global Master Data
        Route::resource('/business-types', BusinessTypeController::class)->except(['create', 'edit', 'show']);
        Route::resource('/business-modules', BusinessModuleController::class)->except(['create', 'edit', 'show']);
        Route::resource('/global-categories', GlobalCategoryController::class)->except(['create', 'edit', 'show']);
        Route::resource('/global-units', GlobalUnitController::class)->except(['create', 'edit', 'show']);
        Route::resource('/global-taxes', GlobalTaxController::class)->except(['create', 'edit', 'show']);
        Route::resource('/global-attributes', GlobalAttributeController::class)->except(['create', 'edit', 'show']);

        // POS & Customization
        Route::resource('/invoice-templates', InvoiceTemplateController::class)->except(['create', 'edit', 'show']);
        Route::resource('/barcode-settings', BarcodeSettingController::class)->except(['create', 'edit', 'show']);
        Route::resource('/email-templates', EmailTemplateController::class)->except(['create', 'edit', 'show']);

        // Addons
        Route::get('/addons/marketplace', [AddonMarketplaceController::class, 'index'])->name('addons.marketplace');
        Route::resource('/addons', AddonController::class)->except(['create', 'edit', 'show']);

        // Helpdesk & Support
        Route::resource('/support-tickets', SupportTicketController::class)->except(['create', 'edit']);
        Route::resource('/announcements', AnnouncementController::class)->except(['create', 'edit', 'show']);
        Route::get('/tenants', [ImpersonateController::class, 'index'])->name('tenants.index');

        // Global Reports
        Route::get('/reports', [SuperAdminReportController::class, 'index'])->name('reports.index');
    });

// ==========================================
// 1b. Impersonation Exit
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/impersonate/leave', [ImpersonateController::class, 'leave'])->name('impersonate.leave');
});

// ==========================================
// 2. Company Admin Routes (Shop Owner)
// ==========================================
Route::middleware(['auth', 'verified', 'role:Company Admin'])
    ->prefix('company')
    ->name('company.')
    ->group(function () {
        Route::get('/dashboard', [CompanyDashboard::class, 'index'])->name('dashboard');

        //  Sales & Invoices (Company Level Overview)
        Route::get('/sales', [CompanySaleController::class, 'index'])->name('sales.index');
        // Route::get('/sales/{sale}', [CompanySaleController::class, 'show'])->name('sales.show'); // Uncomment if needed

        // Branch & Staff Management
        Route::resource('/branches', BranchController::class);
        Route::resource('/users', CompanyUserController::class)->except(['show']);
        Route::patch('/users/{user}/assign-role', [CompanyUserController::class, 'assignRole'])->name('users.assign-role');

        // Inventory Master Data
        Route::resource('/products', ProductController::class);
        // Inventory Master Data
        Route::resource('/products', ProductController::class);
        Route::resource('/categories', CategoryController::class); 

        //  Inventory Operations (Low Stock & Stock Adjustment)
        Route::get('/inventory/low-stock', [CompanyInventoryController::class, 'lowStock'])->name('inventory.low-stock');
        Route::get('/inventory/stock-adjust', [CompanyInventoryController::class, 'stockAdjust'])->name('inventory.stock-adjust');

        // Purchasing & Suppliers
        Route::resource('/purchases', PurchaseController::class);
        Route::resource('/suppliers', SupplierController::class)->except(['create', 'edit', 'show']);

        // Customers & Expenses
        Route::resource('/customers', CustomerController::class)->except(['create', 'edit', 'show']);
        Route::resource('/expenses', ExpenseController::class)->except(['create', 'edit', 'show']);

        // Company-level Reports
        Route::get('/reports/sales', [CompanyReportController::class, 'sales'])->name('reports.sales');
        Route::get('/reports/stock', [CompanyReportController::class, 'stock'])->name('reports.stock');

        //  Settings & Account
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/profile', [CompanySettingController::class, 'profile'])->name('profile');
            Route::get('/invoice', [CompanySettingController::class, 'invoice'])->name('invoice');
        });

        //  Subscription & Announcements
        Route::get('/subscription', [CompanySubscriptionController::class, 'index'])->name('subscription.index');
        Route::get('/announcements', [CompanyAnnouncementController::class, 'index'])->name('announcements.index');
    });

// ==========================================
// 3. Branch Routes (Manager / Salesman)
// ==========================================
Route::middleware(['auth', 'verified', 'role:Manager|Salesman'])
    ->prefix('branch')
    ->name('branch.')
    ->group(function () {
        Route::get('/dashboard', [BranchDashboard::class, 'index'])->name('dashboard');

        // Inventory
        Route::resource('/inventory', InventoryController::class)->except(['create', 'edit', 'show']);
        Route::post('/inventory/{item}/stock-adjust', [StockAdjustmentController::class, 'adjust'])->name('inventory.stock-adjust');

        // POS Terminal
        Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
        Route::post('/pos/checkout', [PosController::class, 'checkout'])->name('pos.checkout');
        Route::get('/pos/invoice/{sale}/print', [PosController::class, 'printInvoice'])->name('pos.invoice-print');

        // Sales History
        Route::resource('/sales', SaleController::class)->only(['index', 'show']);
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

        if ($user->hasRole('Super Admin')) return redirect()->route('superadmin.dashboard');
        if ($user->hasRole('Company Admin')) return redirect()->route('company.dashboard');
        if ($user->hasRole('Manager') || $user->hasRole('Salesman')) return redirect()->route('branch.dashboard');

        abort(403, 'You are logged in, but you don\'t have any specific SaaS role assigned yet! Please contact the Super Admin.');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';