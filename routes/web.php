<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontNewsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\Admin\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
});

Route::delete('/admin/settings/delete-image/{type}', [SettingController::class, 'deleteImage'])->name('admin.settings.deleteImage');

require __DIR__.'/auth.php';

Route::get('/', [FrontNewsController::class, 'index'])->name('home');
Route::get('/{slug}', [FrontNewsController::class, 'show'])->name('show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/category/{slug}', [FrontCategoryController::class, 'show'])->name('category.show');
