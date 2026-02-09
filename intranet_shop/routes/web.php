<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
