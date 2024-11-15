<?php

use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\NoteController;
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

        //Member Route Start Form Here
        Route::resource("member",MemberController::class);
        //Member Route End Form Here
        //Notice Route Start Form Here
        Route::resource('note',NoteController::class);
        //Notice Route End Form Here
    });
});

Auth::routes();

