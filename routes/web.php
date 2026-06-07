<?php

use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\LpProofController;

// Public routes
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->is_admin) {
            return redirect('/admin/dashboard');
        }
        return redirect('/student/dashboard');
    }
    return view('welcome');
});

Route::get('/lp-proof', [LpProofController::class, 'index'])->name('lp.proof');

// Student routes (requires auth)
Route::prefix('student')->name('student.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::post('/optimize', [StudentDashboardController::class, 'optimize'])->name('optimize');
    Route::get('/history', [StudentDashboardController::class, 'history'])->name('history');
    Route::get('/profile', [StudentDashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [StudentDashboardController::class, 'updateProfile'])->name('profile.update');
});

// Admin routes (requires auth + admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // masih di bawah middleware yg sama iaitu admin
    // Food management Route
    Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
    Route::get('/foods/create', [FoodController::class, 'create'])->name('foods.create');
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');
    Route::get('/foods/{food}/edit', [FoodController::class, 'edit'])->name('foods.edit');
    Route::put('/foods/{food}', [FoodController::class, 'update'])->name('foods.update');
    Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('foods.destroy');

    //Student Management routes
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

// Auth routes (provided by Laravel Breeze)
require __DIR__.'/auth.php';

// the question for you nick
// how do you handle middleware and creating them ??
