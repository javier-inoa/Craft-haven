<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');

Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

//administrador

Route::get('/users/{user}/products', [AdminProductController::class, 'index'])->name('admin.products');

Route::get('/users/{user}/users', [AdminUserController::class, 'index'])->name('admin.users');
Route::get('/users/{admin}/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('/users/{admin}/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');

Route::get('/users/{user}/categories', [AdminCategoryController::class, 'index'])->name('admin.categories');
Route::get('/users/{user}/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/users/{user}/categories/store', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/users/{user}/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/users/{user}/categories/{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/users/{user}/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

Route::get('/users/{user}/tags', [AdminTagController::class, 'index'])->name('admin.tags');
Route::get('/users/{user}/tags/create', [AdminTagController::class, 'create'])->name('admin.tags.create');
Route::post('/users/{user}/tags/store', [AdminTagController::class, 'store'])->name('admin.tags.store');
Route::get('/users/{user}/tags/{tag}/edit', [AdminTagController::class, 'edit'])->name('admin.tags.edit');
Route::put('/users/{user}/tags/{tag}', [AdminTagController::class, 'update'])->name('admin.tags.update');
Route::delete('/users/{user}/tags/{tag}', [AdminTagController::class, 'destroy'])->name('admin.tags.destroy');

Route::get('/users/{user}/notifications', [AdminNotificationController::class, 'index'])->name('admin.notifications');
Route::get('/users/{user}/notifications/create/{product}', [AdminNotificationController::class, 'create'])->name('admin.notifications.create');
Route::post('/users/{user}/notifications/store/{product}', [AdminNotificationController::class, 'store'])->name('admin.notifications.store');
Route::get('/users/{user}/notifications/{notification}/edit', [AdminNotificationController::class, 'edit'])->name('admin.notifications.edit');
Route::put('/users/{user}/notifications/{notification}', [AdminNotificationController::class, 'update'])->name('admin.notifications.update');
Route::delete('/users/{user}/notifications/{notification}', [AdminNotificationController::class, 'destroy'])->name('admin.notifications.destroy');




//creator












Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
