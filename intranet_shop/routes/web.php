<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectToViewsController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/employee/employeeDashboard', [RedirectToViewsController::class, "employee"])->name("employee.employeeDashboard");
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
