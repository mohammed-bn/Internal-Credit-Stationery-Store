<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectToViewsController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        switch ($user->role_id) {
            case 3:
                return redirect()->route('employee.employeeDashboard');
            case 2:
                return redirect()->route('manager.managerDashboard');
            case 1:
                return redirect()->route('admin.adminDashboard');
            default:
                return view('welcome');
        }
    })->name('dashboard');
    Route::get('/employee/employeeDashboard', [RedirectToViewsController::class, "employee"])
        ->name("employee.employeeDashboard");
    Route::get('/manager/managerDashboard', function () {
        return view('manager.managerDashboard');
    })->name("manager.managerDashboard");
    Route::get('/admin/adminDashboard', function () {
        return view('admin.adminDashboard');
    })->name("admin.adminDashboard");
    Route::get('/employee/dashboard', function () {
        return view('employee.dashboard');
    })->name("employee.dashboard");
    Route::get('/store', [StoreController::class, 'list'])->name('store.list');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


    // --- 4. Product Management (Admin) ---
    Route::get('/admin/listProduct', [ProductController::class, 'index'])->name('products.index');
    Route::get('/admin/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
