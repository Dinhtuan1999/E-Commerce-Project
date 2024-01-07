<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\LoginController;
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

Route::get('/',[LoginController::class, 'login'])->name('login.index');
Route::post('/post-login',[LoginController::class, 'post'])->name('login.post');


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::prefix('admin')->group(function () {

    //category
    Route::prefix('categories')->group(function () {
        Route::get('/index',[CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create',[CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store',[CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}',[CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}',[CategoryController::class, 'delete'])->name('categories.delete');

    });

    //menu
    Route::prefix('menus')->group(function () {
        Route::get('/index',[MenuController::class, 'index'])->name('menus.index');
        Route::get('/create',[MenuController::class, 'create'])->name('menus.create');
        Route::post('/store',[MenuController::class, 'store'])->name('menus.store');
        Route::get('/edit/{id}',[MenuController::class, 'edit'])->name('menus.edit');
        Route::post('/update/{id}',[MenuController::class, 'update'])->name('menus.update');
        Route::get('/delete/{id}',[MenuController::class, 'delete'])->name('menus.delete');

    });

    //product
    Route::prefix('products')->group(function () {
        Route::get('/index',[ProductController::class, 'index'])->name('products.index');
        Route::get('/create',[ProductController::class, 'create'])->name('products.create');
        Route::post('/store',[ProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('products.edit');
        Route::post('/update/{id}',[ProductController::class, 'update'])->name('products.update');
        Route::get('/delete/{id}',[ProductController::class, 'delete'])->name('products.delete');
        Route::post('ckeditor/upload', [ProductController::class, 'uploadImage'])->name('products.ckeditor.upload');

    });

    //slider
    Route::prefix('sliders')->group(function () {
        Route::get('/index',[SliderController::class, 'index'])->name('sliders.index');
        Route::get('/create',[SliderController::class, 'create'])->name('sliders.create');
        Route::post('/store',[SliderController::class, 'store'])->name('sliders.store');
        Route::get('/edit/{id}',[SliderController::class, 'edit'])->name('sliders.edit');
        Route::post('/update/{id}',[SliderController::class, 'update'])->name('sliders.update');
        Route::get('/delete/{id}',[SliderController::class, 'delete'])->name('sliders.delete');
        Route::post('ckeditor/upload', [ProductController::class, 'uploadImage'])->name('sliders.ckeditor.upload');

    });

    //setting
    Route::prefix('settings')->group(function () {
        Route::get('/index',[SettingController::class, 'index'])->name('settings.index');
        Route::get('/create',[SettingController::class, 'create'])->name('settings.create');
        Route::post('/store',[SettingController::class, 'store'])->name('settings.store');
        Route::get('/edit/{id}',[SettingController::class, 'edit'])->name('settings.edit');
        Route::post('/update/{id}',[SettingController::class, 'update'])->name('settings.update');
        Route::get('/delete/{id}',[SettingController::class, 'delete'])->name('settings.delete');

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
