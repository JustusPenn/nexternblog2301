<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('index');

// Route::resource('blog', BlogController::class);
Route::get('/blog', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::patch('blog/{blog}/update', [BlogController::class, 'update'])->name('blog.update');
Route::delete('blog/{blog}/delete', [BlogController::class, 'destroy'])->name('blog.destroy');


Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
