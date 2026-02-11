<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectToViewsController;
use App\Http\Controllers\StoreController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/store', [StoreController::class, 'list'])->name('store.list');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::get('/employee/employeeDashboard', [RedirectToViewsController::class, "employee"])->name("employee.employeeDashboard");
Route::get('/admin/listProduct', [ProductController::class, 'index']);
Route::get('/admin/adminDashboard', [ProductController::class, 'create']);
Route::get('/create', [ProductController::class, 'create']);
Route::put('/products/{product}', [ProductController::class, 'update'])
    ->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');


// Route::get('/store',[ProductController::class,'index'])->name('products.store');
// Route::get('/index',[ProductController::class,'index'])->name('products.index');
Route::get('/employee/dashboard', function () {
    return view('employee.dashboard');
})->name("employee.dashboard");
Route::get('/manager/dashboard', function () {
    return view('manager.dashboard');
})->name("manager.dashboard");

Route::get('/dashboard', function () {
    $user = auth()->user();

    // Check role and redirect to the specific named route
    switch ($user->role_id) {
        case 3:
            return redirect()->route('employee.employeeDashboard');

        case 2:
            return redirect()->route('manager.managerDashboard');

        case 1:
            return redirect()->route('admin.adminDashboard');

        default:
            // Fallback for users without a specific role
            return view('welcome');
    }
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
