<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\isHR;
use App\Http\Controllers\ProductController;

//page route
Route::view('/', 'welcome')->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/discount', 'discount')->name('discount');
Route::view('/taxes', 'taxes')->name('taxes');
Route::view('/employees', 'employees')->name('employees');
Route::view('/marketplace', 'marketplace')->name('marketplace');
Route::get('/marketplace', [ProductController::class, 'index'])->name('marketplace');
Route::view('/edit-staff-by-admin', 'edit-staff-by-admin');
Route::view('/setting', 'setting')->name('setting');
Route::view('/account', 'account')->name('account');
Route::view('/privacy&condition', 'privacy')->name('privacy&condition');

//profile
Route::view('/profile', 'profile')->name('profile')->middleware('auth');
Route::view('/profile/edit-Profile', 'edit-Profile')->name('edit-Profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');//update user profile

///employees
Route::get('/employees', [UserController::class, 'index'])->name('employees');
Route::get('/employee/{id}', [UserController::class, 'show']);
Route::get('/employees/{id}', [UserController::class, 'update']);
Route::delete('/employees/{id}', [UserController::class,"destroy"]);
Route::post('/employees/{id}', [ProfileController::class, 'UpdateSalaryAndDepartment'])->name('employees.UpdateSalaryAndDepartment');
Auth::routes();

//product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/{id}/update', [ProductController::class,'edit'])->name('product.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/{id}', [ProductController::class,'destroy'])->name('product.delete');
Route::view('/add-product', 'add-product')->name('add-product');
