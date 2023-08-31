<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManufacturerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});
// product 
Route::get('product-list', [ProductController::class, 'index'] );
Route::get('product-add', [ProductController::class, 'add'] );
Route::get('product-edit/{id}', [ProductController::class, 'productedit'] );
Route::post('product-update', [ProductController::class, 'Productupdate'] );
Route::get('product-delete/{id}', [ProductController::class, 'delete'] );
Route::post('product-save', [ProductController::class, 'productsave'] )->name('admin-productsave');
// customer pages
Route::get('customer/index', [CustomerController::class, 'index'] );
Route::get('customer/edit', [CustomerController::class, 'edit'] );
Route::post('customer/update', [CustomerController::class, 'update'] )->name('customer.update');
Route::get('customer/home', [CustomerController::class, 'home'] );
Route::get('customer/contact', [CustomerController::class, 'contact'] );
Route::get('customer/register', [CustomerController::class, 'register'] );
Route::get('customer/login', [CustomerController::class, 'login'] );
Route::post('customer/loginProcess', [CustomerController::class, 'loginProcess'])->name('customer.loginProcess');
Route::get('customer/logout', [CustomerController::class, 'logout'] );
Route::get('customer/products', [CustomerController::class, 'products'] );
Route::post('customer/processRegister', [CustomerController::class, 'processRegister']);
Route::get('customer-delete/{name}', [CustomerController::class, 'delete'] );
// admin dashboard
Route::get('admin/index', [AdminController::class, 'dashboard'] );
Route::get('admin/admin-add', [AdminController::class, 'adminAdd'] )->name('admin-adminAdd');
Route::post('register-save', [AdminController::class, 'registersave'] )->name('admin-registersave');
Route::get('admin/admin-list', [AdminController::class, 'adminList'] );
Route::get('admin/customer-list', [CustomerController::class, 'customerList'] );
Route::get('admin-delete/{id}', [AdminController::class, 'delete'] );
Route::get('admin/product-list', [AdminController::class, 'productList'] );
Route::get('admin/product-add', [AdminController::class, 'productAdd'] )->name('admin-productAdd');
Route::get('admin/category-add', [AdminController::class, 'categoryAdd'] )->name('admin-categoryAdd');
Route::get('admin/category-list', [AdminController::class, 'categoryList'] );
Route::get('admin/register', [AdminController::class, 'register'] )->name('admin-regster');
Route::post('admin/registerProcess', [AdminController::class, 'registerProcess'] )->name('admin-processregister');
Route::get('admin/logout', [AdminController::class, 'login'] )->name('admin-logout');
Route::get('admin/login', [AdminController::class, 'login'] )->name('admin-login');
Route::post('admin/loginProcess', [AdminController::class, 'loginProcess'] )->name('admin-processlogin');
//
Route::get('category-delete/{id}', [CategoryController::class, 'delete'] );
Route::post('category-save', [CategoryController::class, 'categorysave'] )->name('admin-categorysave');
Route::get('category-edit/{id}', [CategoryController::class, 'categoryedit'] );
Route::post('category-update', [CategoryController::class, 'categoryupdate'] );

//
Route::get('manufacturer-delete/{id}', [ManufacturerController::class, 'delete'] );
Route::post('manufacturer-save', [ManufacturerController::class, 'manufacturersave'] )->name('admin-manufacturersave');
Route::get('manufacturer-edit/{id}', [ManufacturerController::class, 'manufactureredit'] );
Route::post('manufacturer-update', [ManufacturerController::class, 'manufacturerupdate'] );
Route::get('admin/manufacturer-list', [AdminController::class, 'manufacturerList'] );
Route::get('admin/manufacturer-add', [AdminController::class, 'manufacturerAdd'] )->name('admin-manufacturerAdd');