<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master.frontend.layouts');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('master.frontend.layouts');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['auth', 'admin'])->group(function(){
        Route::get('admin/dashboard',[ HomeController::class, 'index'])->name('admin.dashboard');

    });
});

require __DIR__.'/auth.php';


