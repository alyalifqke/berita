<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\FrontNewsController;
use App\Http\Controllers\FrontCategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontNewsController::class, 'index'])->name('home');
Route::get('/{slug}', [FrontNewsController::class, 'show'])->name('show');
Route::get('/{slug}', [FrontNewsController::class, 'show'])->name('news');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/category/{slug}', [FrontCategoryController::class, 'show'])->name('category.show');
// Route::get('/archive/{date}', [NewsController::class, 'archive'])->name('news.archive');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('admin/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('admin/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::get('admin/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('admin/{slug}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::delete('admin/news/{slug}/delete', [NewsController::class, 'destroy'])->name('news.destroy');
    // Route::get('admin/news', [NewsController::class, 'index']);
});

require __DIR__.'/auth.php';
