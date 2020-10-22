<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
/*
Route::get('/', function () {
    return view('backend.pages.index');
});

*/

Route::group(['prefix' => 'admin'], function () {
    
    Route::get('/dashboard', [PageController::class,'dashboard'])->name('admin.dashboard');
    //Route::get('/', 'App\Http\Controllers\Backend\PageController@dashboard')->name('admin.dashboard');
    Route::group(['prefix' => '/brands'], function () {
        Route::get('/manage', [BrandController::class,'index'])->name('brands.manage');
        Route::get('/create', [BrandController::class,'create'])->name('brands.create');
        Route::post('/store', [BrandController::class,'store'])->name('brands.store');
        Route::get('/edit/{id}', [BrandController::class,'edit'])->name('brands.edit');
        Route::post('/edit/{id}', [BrandController::class,'update'])->name('brands.update');
        Route::post('/destroy/{id}', [BrandController::class,'destroy'])->name('brands.destroy');

    });
    Route::group(['prefix' => '/categorys'], function () {
        Route::get('/manage', [CategoryController::class,'index'])->name('cat.manage');
        Route::get('/create', [CategoryController::class,'create'])->name('cat.create');
        Route::post('/store', [CategoryController::class,'store'])->name('cat.store');
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('cat.edit');
        Route::post('/edit/{id}', [CategoryController::class,'update'])->name('cat.update');
        Route::post('/destroy/{id}', [CategoryController::class,'destroy'])->name('cat.destroy');

    });

    Route::group(['prefix' => '/product'], function () {
        Route::get('/manage',[ProductController::class,'index'])->name('product.manage');
        Route::get('/create',[ProductController::class,'create'])->name('product.create');
        Route::post('/store',[ProductController::class,'store'])->name('product.store');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/edit/{id}',[ProductController::class,'update'])->name('product.update');
        Route::post('/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');

    });
});
