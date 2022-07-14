<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\BrakingNewsController;
use App\Http\Controllers\Admin\PostnewsController;
use App\Http\Controllers\Website\WebsiteController;

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

// <<===== WEBSITE ROUTE LIST ======>>
Route::get('/', [WebsiteController::class, 'index'])->name('/');
Route::get('category/{id}', [WebsiteController::class, 'category'])->name('category');
Route::get('post/{id}', [WebsiteController::class, 'post'])->name('post');
Route::get('contact', [WebsiteController::class, 'contact'])->name('contact');
Route::get('search', [WebsiteController::class, 'search'])->name('search');

// <<===== ADMIN ROUTE LIST ======>>
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/recycle', [AdminController::class, 'recycle'])->name('recycle');
Route::get('/login', [AdminController::class, 'admin_login'])->name('login');
Route::get('/register', [AdminController::class, 'admin_register'])->name('register');
Route::post('/login_access', [AdminController::class, 'login_access'])->name('login_access');
Route::post('/register_access', [AdminController::class, 'register_access'])->name('register_access');
Route::get('/logout', [AdminController::class, 'logout']);

Route::group(['prefix' => 'dashboard'], function(){
    // <<=====WEBSITE-FOOD-CATEGORY ROUTE LIST ======>>
    Route::group(['prefix' => 'category'], function(){
        Route::get('all', [CategoryController::class, 'index'])->name('category_all');
        Route::get('add', [CategoryController::class, 'add'])->name('category_add');
        Route::post('submit', [CategoryController::class, 'insert'])->name('category_submit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('category_update');
        Route::get('view/{id}', [CategoryController::class, 'view'])->name('category_view');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
        Route::get('softdelete/{id}', [CategoryController::class, 'softdelete'])->name('category_softdelete');
        Route::get('restoredata', [CategoryController::class, 'restoredata'])->name('category_restoredata');
        Route::get('restore/{id}', [CategoryController::class, 'restore'])->name('category_restore');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category_delete');
    });
    // <<===== USERCONTROLLER ROUTE LIST ======>>
    Route::group(['prefix' => 'user'], function(){
        Route::post('submit', [UserController::class, 'insert'])->name('submit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('add', [UserController::class, 'add'])->name('adduser');
        Route::get('all', [UserController::class, 'all'])->name('alluser')->middleware('superadmin');
        Route::get('view/{id}', [UserController::class, 'view'])->name('viewuser');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edituser');
        Route::get('softdelete/{id}', [UserController::class, 'softdelete'])->name('softdeleteuser');
        Route::get('restore', [UserController::class, 'restoredata'])->name('restoreuser');
        Route::get('restore/{id}', [UserController::class, 'restore'])->name('restore');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('deleteuser');
        Route::get('tb', [UserController::class, 'tb']);
    });
    // <<=====WEBSITE-FOOD-CATEGORY ROUTE LIST ======>>
    Route::group(['prefix' => 'news'], function(){
        Route::get('all', [PostnewsController::class, 'all'])->name('news_all');
        Route::get('add', [PostnewsController::class, 'add'])->name('news_add');
        Route::post('submit', [PostnewsController::class, 'insert'])->name('news_submit');
        Route::post('update/{id}', [PostnewsController::class, 'update'])->name('news_update');
        Route::get('view/{id}', [PostnewsController::class, 'view'])->name('news_view');
        Route::get('edit/{id}', [PostnewsController::class, 'edit'])->name('news_edit');
        Route::get('softdelete/{id}', [PostnewsController::class, 'softdelete'])->name('news_softdelete');
        Route::get('restoredata', [PostnewsController::class, 'restoredata'])->name('news_restoredata');
        Route::get('restore/{id}', [PostnewsController::class, 'restore'])->name('news_restore');
        Route::get('delete/{id}', [PostnewsController::class, 'delete'])->name('news_delete');
    });

    // <<===== BRAKING-NEWS ROUTE LIST ======>>
    Route::get('manage/brakingnews', [BrakingNewsController::class, 'brakingnews'])->name('brakingnews_show');
    Route::POST('brakingnews/update', [BrakingNewsController::class, 'brakingnews_update'])->name('brakingnews_update');
    // <<===== MANAGE ROUTE LIST ======>>
    Route::get('manage/contact', [ManageController::class, 'contact'])->name('contact_show');
    Route::POST('contact/update', [ManageController::class, 'contact_update'])->name('contact_update');

    Route::get('manage/social', [ManageController::class, 'social'])->name('social_show');
    Route::POST('social/update', [ManageController::class, 'social_update'])->name('social_update');
// <<===== ROLEROUTE LIST ======>>
    Route::group(['prefix' => 'role'], function(){
        Route::post('submit', [RoleController::class, 'insert'])->name('role_submit');
        Route::post('update', [RoleController::class, 'update']);
        Route::get('add', [RoleController::class, 'add'])->name('addrole');
        Route::get('all', [RoleController::class, 'all'])->name('allrole');
        Route::get('view/{id}', [RoleController::class, 'view'])->name('viewrole');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('editrole');
    });

});

require __DIR__.'/auth.php';
