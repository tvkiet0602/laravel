<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OrmCustomersController;

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

Route::prefix('customersORM')->name('customers.')->group(function (){
    Route::get('/', [OrmCustomersController::class, 'index'])->name('index');

    Route::get('/add', [OrmCustomersController::class, 'addCustomers'])->name('add');
    Route::post('/add', [OrmCustomersController::class, 'postAddCustomers'])->name('post-add');

    Route::get('/edit/{id}', [OrmCustomersController::class, 'editCustomers'])->name('edit');
    Route::post('/edit/{id}', [OrmCustomersController::class, 'postEditCustomers']);

    Route::get('/edit/{id}/addAddress', [OrmCustomersController::class, 'addAddress'])->name('add-address');
    Route::post('/edit/{id}/addAddress', [OrmCustomersController::class, 'postAddress'])->name('post-address');
/* 1-1
    Route::get('/ad', function (){
       $customers = App\Models\Customers::all();
       foreach ($customers as $customer){
           echo "<br>";echo "<br>";
           echo $customer->name;
           echo "<br>";
           if($customer->Address !== null){
               echo $customer->Address->city;

           }
       }
    });
*/
    /*
    Route::get('/ad', function (){
        $customers = App\Models\Customers::all();
        foreach ($customers as $customer){
            echo $customer->name;
            echo "<br>";
            foreach ($customer->address as $address) {
                echo $address->number.', '.$address->street.', '.$address->district.', '.$address->city;
                echo '<br>';
            }
        }
    });
    */
});
