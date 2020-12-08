<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/filter', [App\Http\Controllers\HomeController::class, 'filter'])->name('filter');;

Route::get('/reserveRoom', [App\Http\Controllers\UserController::class, 'reserveRoom'])->name('reserveRoom');
Route::post('/makeReservation/{room}', [App\Http\Controllers\UserController::class, 'makeReservation'])->name('makeReservation');
Route::get('/filterRooms', [App\Http\Controllers\UserController::class, 'filterRooms'])->name('filterRooms');
Route::get('/reservedRooms', [App\Http\Controllers\UserController::class, 'userReservedRooms'])->name('reservedRooms');

Route::prefix('director')->middleware(['verified', 'director', 'auth'])->group(function () {
    Route::get('/director', [App\Http\Controllers\DirectorController::class, 'index']);
    Route::get('/adminControl', [App\Http\Controllers\DirectorController::class, 'adminControl'])->name('adminControl');
    Route::get('/roomInfo', [App\Http\Controllers\DirectorController::class, 'roomInfo'])->name('roomInfo');

    Route::get('/createAdminView', [App\Http\Controllers\DirectorController::class, 'createAdminView'])->name('createAdminView');
    Route::post('/createAdmin', [App\Http\Controllers\DirectorController::class, 'createAdmin'])->name('createAdmin');
    Route::delete('/deleteAdmin/{user}', [App\Http\Controllers\DirectorController::class, 'deleteAdmin'])->name('deleteAdmin');
});

Route::prefix('admin')->middleware(['verified', 'admin', 'auth'])->group(function () {
    Route::get('/rooms', [App\Http\Controllers\AdminController::class, 'getRooms'])->name('rooms');

    Route::get('/viewUsers', [App\Http\Controllers\AdminController::class, 'viewUsers'])->name('viewUsers');
    Route::delete('/deleteUser/{user}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/createRoomView', [App\Http\Controllers\AdminController::class, 'createRoomView'])->name('createRoomView');
    Route::post('/createRoom', [App\Http\Controllers\AdminController::class, 'createRoom'])->name('createRoom');
    Route::delete('/deleteRoom/{room}', [App\Http\Controllers\AdminController::class, 'deleteRoom'])->name('deleteRoom');
});
