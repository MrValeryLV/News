<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\NewsEditController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/vue', 'vue')->name('vue');

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(
        function () {
            Route::get('/', [NewsEditController::class, 'index'])->name('index');
            Route::match(['get','post'],'/create', [NewsEditController::class, 'create'])->name('create');
            Route::get('/edit/{news}', [NewsEditController::class, 'edit'])->name('edit');
            Route::post('/update/{news}', [NewsEditController::class, 'update'])->name('update');
            Route::get('/destroy/{news}', [NewsEditController::class, 'destroy'])->name('destroy');
            Route::get('/downloader', [IndexController::class, 'downloader'])->name('downloader');
        }
    );

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function() {
    Route::group([
        'as' => 'category.'
    ], function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('index');
        Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('show');
    });

    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/one/{news}', [NewsController::class, 'show'])->name('show');
});

Auth::routes();
