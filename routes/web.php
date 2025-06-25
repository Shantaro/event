<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return redirect(route('home'));
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes(['verify' => false, 'reset' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('userList');
    Route::get('/user/create', [UserController::class, 'create'])->name('createUser');
    Route::post('/user/create', [UserController::class, 'store'])->name('storeUser');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('editUser');
    Route::post('/user/edit/{user}', [UserController::class, 'update'])->name('updateUser');
    Route::get('/user/delete/{user}', [UserController::class, 'destroy'])->name('deleteUser');
});
