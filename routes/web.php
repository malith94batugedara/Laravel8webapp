<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

       Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

       Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');

       Route::get('/addcategory', [CategoryController::class, 'create'])->name('admin.add-category');

       Route::post('/addcategory', [CategoryController::class, 'store'])->name('admin.add-category');

       Route::get('/editcategory/{categoryId}', [CategoryController::class, 'edit'])->name('admin.edit-category');

       Route::put('/updatecategory/{categoryId}', [CategoryController::class, 'update'])->name('admin.update-category');

       Route::get('/deletecategory/{categoryId}', [CategoryController::class, 'delete'])->name('admin.delete-category');

});
