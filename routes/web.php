<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\MenuPageController;
use App\Http\Controllers\CartPageController;
use App\Http\Controllers\AboutUsPageController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\ContactsPageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;


//user routes
Route::get('/', [IndexController::class, 'index'])->name('mainpage.index');
Route::get('/menu', [MenuPageController::class, 'index']);
Route::get('/cart', [CartPageController::class, 'index']);
Route::get('/contacts', [ContactsPageController::class, 'index']);
Route::get('/about-us', [AboutUsPageController::class, 'index']);
Route::post('/payment', [PaymentController::class, 'create']);
//testing
// Route::post('/menu', [MenuPageController::class, 'shit']);
// Route::post('/menu', [MenuPageController::class, 'shit']);
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
// Route::get('/clear-cart', [CartPageController::class, 'clearCart']);
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart']);
Route::get('/remove-from-cart-all/{id}', [CartController::class, 'removeAllFromCart']);
Route::post('/create-order', [OrderController::class, 'store']);


//admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminPageController::class, 'index']);
    Route::get('/admin/orders', [OrderController::class, 'index']);

    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/menu-items', MenuItemController::class);
});
    


// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Route::resource('admin/category', CategoryController::class)->middleware('is_admin'); 
});

require __DIR__.'/auth.php';
