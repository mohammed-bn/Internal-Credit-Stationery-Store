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
Route::get('/store', [StoreController::class,'list'])->name('store.list');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::get('/employee/employeeDashboard', [RedirectToViewsController::class, "employee"])->name("employee.employeeDashboard");
Route::get('/manager/managerDashboard', [RedirectToViewsController::class, "manager"])->name("manager.managerDashboard");
Route::get('/admin/listProduct', [ProductController::class, 'index']);
Route::get('/admin/adminDashboard', [ProductController::class, 'create']);
Route::get('/create', [ProductController::class, 'create']);


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
