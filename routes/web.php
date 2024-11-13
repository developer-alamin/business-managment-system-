<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;


Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function() {
    Route::prefix('dashboard')->group(function(){
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::prefix("users")->group(function(){
            Route::get("/roleBassedPermission",[UserController::class,"roleBassedPermission"])->name("role.bassed.permission");
        });
        Route::resource('roles', controller: RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('permission', PermissionController::class);
    });
});

Auth::routes();

