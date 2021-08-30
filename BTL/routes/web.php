<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\PhotogroupController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
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
Route::get('/', [PageController::class, 'home']);
Route::get('about-us', [PageController::class, 'aboutus']);
Route::get('news', [PageController::class, 'news']);
Route::get('products', [PageController::class, 'product']);
Route::get('shareholder', [PageController::class, 'shareholder']);

Route::get('product-detail/{id}', [PageController::class, 'productDetail']);
Route::get('contact-us', [PageController::class, 'contact']);
Route::post('contact-us', [PageController::class, 'postContact']);

Route::get('category/{id}/{slug}.html', [PageController::class, 'category']);
Route::get('new/{id}/{slug}.html', [PageController::class, 'newDetail']);

Route::get('upload/{id}', [PageController::class, 'shareHolderDownload']);





Route::get('admin', function () {
    return view('admin.home-admin');
})->middleware(CheckLogin::class);

// login admin
Route::get('login', [UserController::class, 'getLoginAdmin']);
Route::post('login', [UserController::class, 'postLoginAdmin']);
Route::get('logout', [UserController::class, 'logout']);

// admin
Route::group(['prefix' => 'admin', 'middleware' => [CheckLogin::class]], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('list', [UserController::class, 'getList']);
        Route::get('add', [UserController::class, 'getAdd']);
        Route::post('add', [UserController::class, 'postAdd']);
        Route::get('edit/{id}', [UserController::class, 'getEdit']);
        Route::post('edit/{id}', [UserController::class, 'postEdit']);
        Route::delete('delete/{id}', [UserController::class, 'postDelete']);
    });
    Route::group(['prefix' => 'categories'], function () {
        Route::get('list', [CategoriesController::class, 'getList']);
        Route::get('add', [CategoriesController::class, 'getAdd']);
        Route::post('add', [CategoriesController::class, 'postAdd']);
        Route::get('edit/{id}', [CategoriesController::class, 'getEdit']);
        Route::post('edit/{id}', [CategoriesController::class, 'postEdit']);
        Route::delete('delete/{id}', [CategoriesController::class, 'postDelete']);
    });
    Route::group(['prefix' => 'photos'], function () {
        Route::get('list', [PhotosController::class, 'getList']);
        Route::get('add', [PhotosController::class, 'getAdd']);
        Route::post('add', [PhotosController::class, 'postAdd']);
        Route::get('edit/{id}', [PhotosController::class, 'getEdit']);
        Route::post('edit/{id}', [PhotosController::class, 'postEdit']);
        Route::delete('delete/{id}', [PhotosController::class, 'postDelete']);
    });
    Route::group(['prefix' => 'photogroups'], function () {
        Route::get('list', [PhotogroupController::class, 'getList']);
        Route::get('add', [PhotogroupController::class, 'getAdd']);
        Route::post('add', [PhotogroupController::class, 'postAdd']);
        Route::get('edit/{id}', [PhotogroupController::class, 'getEdit']);
        Route::post('edit/{id}', [PhotogroupController::class, 'postEdit']);
        Route::delete('delete/{id}', [PhotogroupController::class, 'postDelete']);
    });
    Route::group(['prefix' => 'settings'], function () {
        Route::get('edit/1', [SettingsController::class, 'getEdit']);
        Route::post('edit/1', [SettingsController::class, 'postEdit']);
    });
    Route::group(['prefix' => 'role'], function () {
        Route::get('list', [RoleController::class, 'getList']);
        Route::get('add', [RoleController::class, 'getAdd']);
        Route::post('add', [RoleController::class, 'postAdd']);
        Route::get('edit/{id}', [RoleController::class, 'getEdit']);
        Route::post('edit/{id}', [RoleController::class, 'postEdit']);
        Route::delete('delete/{id}', [RoleController::class, 'postDelete']);
    });
    Route::group(['prefix' => 'menus'], function () {
        Route::get('list', [MenusController::class, 'getList']);
        Route::get('add', [MenusController::class, 'getAdd']);
        Route::post('add', [MenusController::class, 'postAdd']);
        Route::get('edit/{id}', [MenusController::class, 'getEdit']);
        Route::post('edit/{id}', [MenusController::class, 'postEdit']);
        Route::delete('delete/{id}', [MenusController::class, 'postDelete']);
    });
    Route::group(['prefix' => 'news'], function () {
        Route::get('list', [NewsController::class, 'getList']);
        Route::get('add', [NewsController::class, 'getAdd']);
        Route::post('add', [NewsController::class, 'postAdd']);
        Route::get('edit/{id}', [NewsController::class, 'getEdit']);
        Route::post('edit/{id}', [NewsController::class, 'postEdit']);
        Route::delete('delete/{id}', [NewsController::class, 'postDelete']);
        Route::get('search', [NewsController::class, 'search']);
    });
    Route::group(['prefix' => 'slides'], function () {
        Route::get('list', [SlideController::class, 'getList']);
        Route::get('add', [SlideController::class, 'getAdd']);
        Route::post('add', [SlideController::class, 'postAdd']);
        Route::get('edit/{id}', [SlideController::class, 'getEdit']);
        Route::post('edit/{id}', [SlideController::class, 'postEdit']);
        Route::delete('delete/{id}', [SlideController::class, 'postDelete']);
    });
    Route::group(['prefix' => 'upload'], function () {
        Route::get('list', [UploadController::class, 'getList']);
        Route::get('add', [UploadController::class, 'getAdd']);
        Route::post('add', [UploadController::class, 'postAdd']);
        Route::get('edit/{id}', [UploadController::class, 'getEdit']);
        Route::post('edit/{id}', [UploadController::class, 'postEdit']);
        Route::delete('delete/{id}', [UploadController::class, 'postDelete']);
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('list', [ProductController::class, 'getList']);
        Route::get('add', [ProductController::class, 'getAdd']);
        Route::post('add', [ProductController::class, 'postAdd']);
        Route::get('edit/{id}', [ProductController::class, 'getEdit']);
        Route::post('edit/{id}', [ProductController::class, 'postEdit']);
        Route::delete('delete/{id}', [ProductController::class, 'postDelete']);
    });
});