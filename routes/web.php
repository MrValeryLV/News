<?php

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [NewsController::class, 'index'])->name('index');
Route::view('/about', 'about')->name('about');
Route::view('/vue', 'vue')->name('vue');

// todo уневерсальный обработчик c параметром $soc les10 начало
Route::get('/auth/vk', [LoginController::class, 'loginVK'])->name('vklogin');
Route::get('/auth/vk/response', [LoginController::class, 'responseVK'])->name('responseVK');

Route::match(['get','post'],'/profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->middleware(['is_admin', 'auth'])
    ->group(
        function () {
            Route::get('/', [NewsEditController::class, 'index'])->name('index');
            Route::match(['get','post'],'/create', [NewsEditController::class, 'create'])->name('create');
            Route::get('/edit/{news}', [NewsEditController::class, 'edit'])->name('edit');
            Route::post('/update/{news}', [NewsEditController::class, 'update'])->name('update');
            Route::get('/destroy/{news}', [NewsEditController::class, 'destroy'])->name('destroy');
            Route::get('/users', [UsersController::class, 'index'])->name('updateUser');
            Route::get('/users/toggleAdmin/{user}', [UsersController::class, 'toggleAdmin'])->name('toggleAdmin');
            Route::get('/users/destroyUser/{user}', [UsersController::class, 'destroy'])->name('destroyUser');
            Route::get('/parser', [ParserController::class, 'index'])->name('parser');
            Route::get('/downloader', [IndexController::class, 'downloader'])->name('downloader');
            // todo перейти на resours (web, menu и menu.admin, NewsEditController + views) les-8
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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'is_admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();
