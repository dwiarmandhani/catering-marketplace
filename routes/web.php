<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('customer/search', [CustomerController::class, 'search'])->name('customer.search');
    Route::get('customer/order/{menuId}', [CustomerController::class, 'showOrderForm'])->name('customer.order.form');
    Route::post('customer/order/{menuId}', [CustomerController::class, 'order'])->name('customer.order');
    Route::get('customer/orders', [CustomerController::class, 'orders'])->name('customer.orders.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/users/{user}/edit-role', [UserController::class, 'editRole'])->name('users.editRole');
    Route::post('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

Route::middleware(['auth', 'role:merchant'])->group(function () {
    Route::get('merchant/mycompany', [MerchantProfileController::class, 'index'])->name('merchant.profile.index');
    Route::get('merchant/createprofile', [MerchantProfileController::class, 'create'])->name('merchant.profile.create');
    Route::post('merchant/postprofile', [MerchantProfileController::class, 'store'])->name('merchant.profile.store');
    Route::get('merchant/profile', [MerchantProfileController::class, 'edit'])->name('merchant.profile.edit');
    Route::post('merchant/profile', [MerchantProfileController::class, 'update'])->name('merchant.profile.update');

    Route::get('merchant/menu', [MenuController::class, 'index'])->name('merchant.menu.index');
    Route::get('merchant/createmenu', [MenuController::class, 'create'])->name('merchant.menu.create');
    Route::post('merchant/createmenu', [MenuController::class, 'store'])->name('merchant.menu.store');
    Route::get('merchant/editmenu/{id}', [MenuController::class, 'edit'])->name('merchant.menu.edit');
    Route::put('merchant/menu/{id}/edit', [MenuController::class, 'update'])->name('merchant.menu.update');
    Route::delete('merchant/menu/{menu}', [MenuController::class, 'destroy'])->name('merchant.menu.delete');

    Route::get('merchant/orders', [MenuController::class, 'orderList'])->name('merchant.orders.index');
    Route::get('merchant/invoice/{order}', [MenuController::class, 'showInvoice'])->name('merchant.invoice.show');
    Route::patch('merchant/orders/{order}', [MenuController::class, 'updateStatus'])->name('merchant.orders.update');
});






require __DIR__.'/auth.php';
