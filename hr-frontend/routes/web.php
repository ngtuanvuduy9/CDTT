<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProjectController;


Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

/* ================== EMPLOYEES ================== */
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');

/* ================== DEPARTMENTS ================== */
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

/* ================== POSITIONS ================== */
Route::get('/positions', [PositionController::class, 'index'])->name('positions.index');
Route::get('/positions/create', [PositionController::class, 'create'])->name('positions.create');
Route::post('/positions', [PositionController::class, 'store'])->name('positions.store');
Route::get('/positions/{id}/edit', [PositionController::class, 'edit'])->name('positions.edit');
Route::put('/positions/{id}', [PositionController::class, 'update'])->name('positions.update');
Route::delete('/positions/{id}', [PositionController::class, 'destroy'])->name('positions.destroy');

Route::resource('attendances', App\Http\Controllers\AttendanceController::class);

Route::resource('projects', ProjectController::class);
