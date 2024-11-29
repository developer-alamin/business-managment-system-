<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\InvestmentCollectionContainer;
use App\Http\Controllers\Admin\InvestmentController;
use App\Http\Controllers\Admin\InvestorController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\PaymentMethodController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceTypeController;

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
        //Investor Route Start Form Here
        Route::resource('investor',InvestorController::class);
         //Investor Route End Form Here

        //Investor Collection Route Start Form Here
        Route::prefix('investors')->group(function(){
            Route::resource('collecttion',InvestmentCollectionContainer::class);
        });
        // Investor Collection Route End Form Here
        // Product Route Start Form Here
        Route::resource('product',ProductController::class);
        // Product Route End Form Here
        // Invesmnent Route Start Form Here
        Route::controller(InvestmentController::class)
        ->prefix('investments')
        ->group(function () {
            Route::get('productSelect', 'productSelect')->name('investmentsproductSelect');
            Route::get('memberselect', 'memberselect')->name('investmentsmemberselect');

        });
        Route::resource('investment',InvestmentController::class);
        // Invesmnent Route End Form Here
        // Doctor Route Start Form Here
      
        Route::resource('doctor',DoctorController::class);
        // Doctor Route End Form Here
        // Service Route Start Form Here
        Route::controller(ServiceController::class)
        ->prefix('services')
        ->group(function () {
            Route::get('memberbyproduct', 'memberbyproduct')->name('servicesmemberbyproduct');
        });
        Route::resource('service',ServiceController::class);
        // Service Route End Form Here
        // Service Type Route Start Form Here
        Route::resource('servicetype',ServiceTypeController::class);
        // Service Type Route End Form Here

        //Payment Method Route Start Form Here
        Route::prefix('payment')->group(function(){
            Route::resource('method',PaymentMethodController::class);
        });
        //Payment Method Route End Form Here
        //Expense Route Start Form Here
        Route::resource('expense',ExpenseController::class);
        //Expense Route End Form Here

        //Income Route Start Form Here
        Route::resource('income',IncomeController::class);
        //Income Route End Form Here

        //Attribute Route Start Form Here
        Route::prefix('attributes')->group(function(){
            Route::get('/{slug}',[AttributeController::class,'attributesgetvalues'])->name('attributes.values');
            Route::post('{slug}/value/store',[AttributeController::class,'attributesvaluestore'])->name('attributes.value.store');
            Route::get('{slug}/value/{value}/edit',[AttributeController::class,'attributesvalueedit'])->name('attributes.value.edit');
            Route::put('{slug}/value/{value}',[AttributeController::class,'attributesvalueupdate'])->name('attributes.value.update');
            Route::delete('{slug}/value/{value}',[AttributeController::class,'attributesvaluedelete'])->name('attributes.value.delete');
        });
        Route::resource('attribute',AttributeController::class);
        //Attribute Route End Form Here

        //Loan Route Start Form Here
        Route::resource('loan',LoanController::class);
        //Loan Route End Form Here
    });
});

Auth::routes();

