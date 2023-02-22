<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;

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


Route::prefix('customers')->group(function (){
    Route::get('/', [CustomersController::class, 'index'])->name('customers');

    Route::get('/edit/{id}', [CustomersController::class, 'editCustomers'])->name('edit');
    Route::post('/edit/{id}', [CustomersController::class, 'postEditCustomers']);

    Route::get('/delete/{id}', [CustomersController::class, 'deleteCustomers'])->name('delete');

    Route::match(['get', 'post'], '/add',  [CustomersController::class, 'postAddCustomers'])->name('add');

});
