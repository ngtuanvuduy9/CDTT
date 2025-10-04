<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\WorkScheduleController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\DashboardController;

// Trang mặc định -> redirect login
Route::get('/', function () {
    return redirect()->route('admin.login');
});

// Test API connection route
Route::get('/test-api', function() {
    try {
        // Test employees API
        $employees = Http::get('http://localhost:8000/api/employees');
        
        // Test salaries API
        $salaries = Http::get('http://localhost:8000/api/salaries');
        
        return response()->json([
            'employees' => [
                'status' => $employees->status(),
                'success' => $employees->successful(),
                'count' => $employees->successful() ? count($employees->json()) : 0,
                'data' => $employees->successful() ? $employees->json() : $employees->body()
            ],
            'salaries' => [
                'status' => $salaries->status(),
                'success' => $salaries->successful(),
                'count' => $salaries->successful() ? count($salaries->json()) : 0,
                'data' => $salaries->successful() ? $salaries->json() : $salaries->body()
            ]
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'line' => $e->getLine(),
            'file' => $e->getFile()
        ]);
    }
});

// ================= PUBLIC AUTH ROUTES =================
// Không cần middleware ở đây
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');

    Route::get('forgot-password', [AdminAuthController::class, 'showForgotForm'])->name('admin.forgot');
    Route::post('forgot-password', [AdminAuthController::class, 'forgot'])->name('admin.forgot.post');

    Route::get('change-password', [AdminAuthController::class, 'showChangePasswordForm'])->name('admin.change_password');
    Route::post('change-password', [AdminAuthController::class, 'changePassword'])->name('admin.change_password.post');

    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// ================= PROTECTED ADMIN ROUTES =================
// Xóa middleware 'admin' vì FE không cần, dùng session check trong controller
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('employees', EmployeeController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('work-schedules', WorkScheduleController::class);
    Route::resource('feedback', FeedbackController::class);
});

// ================= EMPLOYEE AUTH ROUTES =================
// Thêm route cho login và dashboard của employee (nhân viên).
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('login', [App\Http\Controllers\Employee\EmployeeAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Employee\EmployeeAuthController::class, 'login'])->name('login.post');
    Route::post('logout', [App\Http\Controllers\Employee\EmployeeAuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('dashboard');
});
