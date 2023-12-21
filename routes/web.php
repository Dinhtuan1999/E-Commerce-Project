<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::prefix('admin')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('/index',[CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create',[CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store',[CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}',[CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}',[CategoryController::class, 'delete'])->name('categories.delete');

    });

    Route::prefix('menus')->group(function () {
        Route::get('/index',[MenuController::class, 'index'])->name('menus.index');
        Route::get('/create',[MenuController::class, 'create'])->name('menus.create');
        Route::post('/store',[MenuController::class, 'store'])->name('menus.store');
        Route::get('/edit/{id}',[MenuController::class, 'edit'])->name('menus.edit');
        Route::post('/update/{id}',[MenuController::class, 'update'])->name('menus.update');
        Route::get('/delete/{id}',[MenuController::class, 'delete'])->name('menus.delete');

    });
});
