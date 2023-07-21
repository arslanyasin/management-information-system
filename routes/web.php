<?php

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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard');

    });
    // BudgetController routes
    Route::resource('budgets', \App\Http\Controllers\BudgetController::class);

// TransactionController routes
    Route::resource('transactions', \App\Http\Controllers\TransactionController::class);

// AccountController routes
    Route::resource('accounts', \App\Http\Controllers\AccountController::class);

// InvoiceController routes
    Route::resource('invoices', \App\Http\Controllers\InvoiceController::class);

// SupplierController routes
    Route::resource('suppliers', \App\Http\Controllers\SupplierController::class);

// PurchaseOrderController routes
    Route::resource('purchase_orders', \App\Http\Controllers\PurchaseOrderController::class);

// ProductController routes
    Route::resource('products', \App\Http\Controllers\ProductController::class);

// InventoryController routes
    Route::resource('inventories', \App\Http\Controllers\InventoryController::class);

// ShipmentController routes
    Route::resource('shipments', \App\Http\Controllers\ShipmentController::class);

// ProjectController routes
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);

// TaskController routes
    Route::resource('tasks', \App\Http\Controllers\TaskController::class);

// ResourceController routes
    Route::resource('resources', \App\Http\Controllers\ResourceController::class);

// ExpenseController routes
    Route::resource('expenses', \App\Http\Controllers\ExpenseController::class);

// CustomerController routes
    Route::resource('customers', \App\Http\Controllers\CustomerController::class);

// LeadController routes
    Route::resource('leads', \App\Http\Controllers\LeadController::class);

// OpportunityController routes
    Route::resource('opportunities', \App\Http\Controllers\OpportunityController::class);

// ProductController routes
    Route::resource('products', \App\Http\Controllers\ProductController::class);

// QuoteController routes
    Route::resource('quotes', \App\Http\Controllers\QuoteController::class);

// OrderController routes
    Route::resource('orders', \App\Http\Controllers\OrderController::class);

    // EmployeeController routes
    Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
    Route::post('employee/delete', [\App\Http\Controllers\EmployeeController::class, 'delete'])->name('employee-delete');
    Route::get('employee/profile/{id?}', [\App\Http\Controllers\EmployeeController::class, 'profile'])->name('employee-profile');

    // ClientController routes
    Route::resource('clients', \App\Http\Controllers\ClientController::class);
    Route::post('clients/delete', [\App\Http\Controllers\ClientController::class, 'delete'])->name('clients-delete');
    Route::get('clients/profile/{id?}', [\App\Http\Controllers\ClientController::class, 'profile'])->name('clients-profile');

    // ProjectController routes
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::post('projects/delete', [\App\Http\Controllers\ProjectController::class, 'delete'])->name('projects-delete');
    Route::get('projects/detail/{id?}', [\App\Http\Controllers\ProjectController::class, 'detail'])->name('projects-detail');

// AttendanceController routes
    Route::resource('attendances', \App\Http\Controllers\AttendanceController::class);

// LeaveController routes
    Route::resource('leaves', \App\Http\Controllers\LeaveController::class);

// PerformanceController routes
    Route::resource('performances', \App\Http\Controllers\PerformanceController::class);

// TrainingController routes
    Route::resource('trainings', \App\Http\Controllers\TrainingController::class);

// DepartmentsController routes
    Route::resource('departments', \App\Http\Controllers\DepartmentController::class);
    Route::post('departments/delete', [\App\Http\Controllers\DepartmentController::class, 'delete'])->name('departments-delete');
    Route::any('getPositionsByDepartment/{id?}', [\App\Http\Controllers\DepartmentPositionController::class, 'getPositionsByDepartment'])->name('get-positions');

// DepartmentsController routes
    Route::resource('positions', \App\Http\Controllers\DepartmentPositionController::class);
    Route::post('positions/delete', [\App\Http\Controllers\DepartmentPositionController::class, 'delete'])->name('positions-delete');

// UserController routes
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::post('users/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('users-delete');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
