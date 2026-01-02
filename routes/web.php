<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SettingsController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home',action: [HomeController::class, 'index'])->name('home');
Route::get('/home-create',action: [HomeController::class, 'createTodos'])->name('home.create');
Route::get('/home/{todoId}', action: [HomeController::class, 'show'])->name('home.show');
Route::get('/contact',action: [ContactController::class, 'contact'])->name('contact');
Route::get('/about',action: [AboutController::class, 'about'])->name('about');
Route::get('/settings',action: [SettingsController::class, 'settings'])->name('settings');

require __DIR__.'/auth.php';
