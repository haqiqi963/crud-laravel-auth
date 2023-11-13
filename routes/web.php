<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authentication']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});


Route::middleware('auth')->group(function () {

    Route::get('home', [UserController::class, 'index']);
    Route::get('logout', [AuthController::class, 'logout']);

    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index']);
        Route::get('fetchAll', [PostController::class, 'fetchAll'])->name('fetchAll');
        Route::post('store', [PostController::class, 'store'])->name('store');
        Route::get('edit', [PostController::class, 'edit'])->name('edit');
        Route::post('update', [PostController::class, 'update'])->name('update');
        Route::delete('delete', [PostController::class, 'delete'])->name('delete');
    });

});







