<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

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

Route::get('/welcome', [WelcomeController::class, 'index']);

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/addresses', [UserAddressController::class, 'index'])->name('addresses.index');

Route::get('/users/{user}/addresses/create', [UserAddressController::class, 'create'])->name('addresses.create');
route::post('users/{user}/addresses', [UserAddressController::class, 'store'])->name('addresses.store');
Route::get('/users/{user}/addresses/edit', [UserAddressController::class, 'edit'])->name('addresses.edit');
Route::get('/users/{user}/addresses/delete', [UserAddressController::class, 'destroy'])->name('addresses.destroy');

