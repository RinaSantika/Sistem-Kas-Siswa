<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CustomerController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('user/{id}/delete', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicle/store', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/vehicle/{id}/edit', [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::get('/vehicle/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
    Route::post('vehicle/{id}/delete', [VehicleController::class, 'delete'])->name('vehicle.delete');

    Route::get('/bill', [BillController::class, 'index'])->name('bill.index');
    Route::get('/bill/create', [BillController::class, 'create'])->name('bill.create');
    Route::post('/bill/store', [BillController::class, 'store'])->name('bill.store');
    Route::get('/bill/{id}/edit', [BillController::class, 'edit'])->name('bill.edit');
    Route::get('/bill/{id}', [BillController::class, 'update'])->name('bill.update');
    Route::post('bill/{id}/delete', [BillController::class, 'delete'])->name('bill.delete');

    Route::post('/bill/softdelete/{id}', [BillController::class, 'softDelete'])->name('bill.softdelete');
    Route::get('/bill/restore/{id}', [BIllController::class, 'restore'])->name('bill.restore');
    Route::post('/bill/sdelete', [BillController::class, 'billsoft'])->name('bill.soft');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::post('customer/{id}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
});


Auth::routes();

Route::get('/home', [BillController::class, 'indexjoin'])->name('home.index');
Route::get('search', [BillController::class, 'indexsearch'])->name('home.indexsearch');
