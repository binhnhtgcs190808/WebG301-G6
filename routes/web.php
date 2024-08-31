<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
Route::get('/', function () {
    return view('home');
});


//test route auth
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    //Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');

    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');
});
//test route auth

/*
Route::get('index',[ProductController::class, 'index']);
Route::get('add',[ProductController::class, 'add']);
Route::post('save',[ProductController::class, 'save']);
Route::get('edit/{id}',[ProductController::class, 'edit']);
Route::post('update',[ProductController::class, 'update']);
Route::get('delete/{id}',[ProductController::class, 'delete']);
*/

Route::get('customers/index', [ProductController::class, 'index']);
Route::get('customers/products', [ProductController::class, 'products']);
//Route::get('customers/register', [CustomerController::class, 'register']);
//Route::post('customers/registerProcess', [CustomerController::class, 'registerProcess'])->name('registerProcess');
//Route::get('customers/login', [CustomerController::class, 'login'])->name('login');
//Route::post('customers/loginProcess', [CustomerController::class, 'loginProcess'])->name(('loginProcess'));
//Route::get('customers/logout', [CustomerController::class, 'logout'])->name('logout');


Route::get('admin/index', [AdminController::class, 'index']);

//Route::get('admin/register', [AdminController::class, 'register']);
//Route::post('admin/checkRegister', [AdminController::class, 'checkRegister'])->name('checkRegister');

//Route::get('admin/login', [AdminController::class, 'login'])->name('login');
//Route::post('admin/checkLogin', [AdminController::class, 'checkLogin'])->name('checkLogin');
//Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('admin/products', [ProductController::class, 'productsAdmin'])->name('products');
Route::get('admin/add', [AdminController::class, 'add'])->name('add');
Route::post('admin/save', [AdminController::class, 'save'])->name('save');
Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('admin/update', [AdminController::class, 'update'])->name('update');
Route::get('admin/delete/{id}', [AdminController::class, 'delete'])->name('delete');



Route::get('admin/adminProfile', [AdminController::class, 'getAdminProfile'])->name('admin.getAdminProfile');
Route::get('admin/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
Route::post('admin/updateAdmin', [AdminController::class, 'updateAdmin'])->name('updateAdmin');
Route::get('admin/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');
Route::post('admin/store', [AdminController::class, 'store'])->name('store');

Route::get('customers/comment', [CommentController::class, 'index'])->name('index');
Route::get('customers/commentEdit/{id}', [CommentController::class, 'cmtEdit'])->name('cmtEdit');
Route::post('customers/cmtUpdate', [CommentController::class, 'cmtUpdate'])->name('cmtUpdate');
Route::get('customers/cmtDelete/{id}', [CommentController::class, 'cmtDelete'])->name('cmtDelete');
Route::post('customers/store', [CommentController::class, 'store'])->name('store');

//category crud
Route::get('admin/category', [CategoryController::class, 'catAdmin'])->name('catAdmin');
Route::post('admin/catStore', [CategoryController::class, 'catStore'])->name('catStore');
Route::get('admin/catEdit/{id}', [CategoryController::class, 'catEdit'])->name('catEdit');
Route::post('admin/catUpdate', [categoryController::class, 'catUpdate'])->name('catUpdate');
Route::get('admin/catDelete/{id}', [CategoryController::class, 'catDelete'])->name('catDelete');

//admin crud
Route::get('admin/adminProfile', [AdminController::class, 'getAdminProfile'])->name('admin.getAdminProfile');
Route::get('admin/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
Route::post('admin/updateAdmin', [AdminController::class, 'updateAdmin'])->name('updateAdmin');
Route::get('admin/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');
Route::post('admin/store', [AdminController::class, 'store'])->name('store');