<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\FrontendNewsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\FrontendCategoryController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendNewsController::class, 'index'])->name('home');
Route::get('/{slug}', [FrontendNewsController::class, 'show'])->name('show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/category/{slug}', [FrontendCategoryController::class, 'show'])->name('category.show');
// Route::get('/archive/{date}', [NewsController::class, 'archive'])->name('news.archive');



Route::prefix('admin')->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
});

Route::get('/admin/news', function () {
    return view('admin.news.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
