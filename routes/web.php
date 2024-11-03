<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::view('admin/login', 'admin.auth.login');
    Route::view('admin', 'admin.auth.login')->name('admin');
    Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('logout/', [AdminController::class, 'logout'])->name('logout');

    #===User====#
    Route::get('users/', [UserController::class, 'index'])->name('users');
    Route::get('get-users/', [UserController::class, 'getusers'])->name('get.user');
    Route::post('store-users/', [UserController::class, 'createOrUpdate'])->name('users.store');
    Route::get('edit-users/{user?}', [UserController::class, 'edit'])->name('users.edit');
    Route::get('users/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/destroy-single/{id}', [UserController::class, 'destroySingle'])->name('users.destroy.single');

    #======Loaction Routes=====#
    #======Roles=====#
    Route::get('roles/', [RoleController::class, 'index'])->name('roles');
    Route::get('get-roles/', [RoleController::class, 'getroles'])->name('get.roles');
    Route::post('store-roles/', [RoleController::class, 'createOrUpdate'])->name('roles.store');
    Route::get('edit-roles/{role?}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::get('roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('roles/destroy-single/{id}', [RoleController::class, 'destroySingle'])->name('roles.destroy.single');
});
