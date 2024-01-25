<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::middleware(['auth', 'CheckBanStatus'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('forum', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::resource('comments', CommentController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin/ban', BanController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.adminboard'); // Pour le menu déroulant
});

Route::get('/banned', function () {
    return view('banned');
})->name('banned');

require __DIR__.'/auth.php';