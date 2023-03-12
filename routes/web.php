<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;







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

Route::get('/', [ProjectController::class, 'home']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/categories/{category:slug}', [ProjectController::class, 'listByCategory']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);
Route::get('/tags/{tag:slug}', [ProjectController::class, 'listByTag']);

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/projects/create', [ProjectController::class, 'create']);
    Route::post('/admin/projects/create', [ProjectController::class, 'store']);
    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit']);
    Route::patch('/admin/projects/{project}/edit', [ProjectController::class, 'update']);
    Route::delete('/admin/projects/{project}/delete', [ProjectController::class, 'destroy']);

    Route::get('/admin/users/create',[UserController::class, 'create']);
    Route::post('/admin/users/create', [UserController::class, 'store']);   
    Route::get('/admin/users/{user}/edit',[UserController::class, 'edit']);
    Route::patch('/admin/users/{user}/edit', [UserController::class, 'update']);
    Route::delete('/admin/users/{user}/delete', [UserController::class, 'destroy']);

    Route::get('/admin/category/create', [CategoryController::class, 'create'])->middleware('admin');
    Route::post('/admin/category/create', [CategoryController::class, 'store'])->middleware('admin');
    Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit'])->middleware('admin');
    Route::patch('/admin/category/{category}/edit', [CategoryController::class, 'update'])->middleware('admin');
    Route::delete('/admin/category/{category}/delete', [CategoryController::class, 'destroy'])->middleware('admin');


    Route::get('/admin/tag/create', [TagController::class, 'create'])->middleware('admin');
    Route::post('/admin/tag/create', [TagController::class, 'store'])->middleware('admin');
    Route::get('/admin/tag/{tag}/edit', [TagController::class, 'edit'])->middleware('admin');
    Route::patch('/admin/tag/{tag}/edit', [TagController::class, 'update'])->middleware('admin');
    Route::delete('/admin/tag/{tag}/delete', [TagController::class, 'destroy'])->middleware('admin');
});
Route::fallback(function() {

    // Set a flash message
    session()->flash('error','Requested page not found.  Home you go.');

    // Redirect to /
    return redirect('/');
});

Route::get('/api/projects', [ProjectController::class, 'getProjectsJSON']);
Route::get('/api/categories', [CategoryController::class, 'getCategoriesJSON']);
Route::get('/api/tags', [TagController::class, 'getTagsJSON']);


