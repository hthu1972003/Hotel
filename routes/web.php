<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('adminMiddleware')->get('/dashboard', function (){
   return view('dashboard') ;
});
Route::get('/calendar/',function (){
    return view('calendar');
});

// Admin
Route::prefix('admin')->group(function (){
    // Admin index
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index']) ->name('admin.index');
// Daskboard
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    // Admin create
    Route::get('/create',[\App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
// Route luu du lieu create
    Route::post('/create', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
// Route hien thi view edit
    Route::get('/{id}/edit',[\App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
// Route update du lieu
    Route::put('/{id}/edit',[\App\Http\Controllers\AdminController::class,'update'])->name('admin.update');
// Route de xoa du lieu
    Route::delete('/{id}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');
});



//Log in
Route::get('/login-admin', [\App\Http\Controllers\AdminController::class, 'login']) ->name('admin.login');
Route::post('/login-admin', [\App\Http\Controllers\AdminController::class, 'loginProcess']) ->name('admin.loginProcess');

Route::get('/login-customer', [\App\Http\Controllers\CustomerController::class, 'login']) ->name('customer.login');
Route::post('/login-customer', [\App\Http\Controllers\CustomerController::class, 'loginProcess']) ->name('customer.loginProcess');


// Customer
Route::prefix('customer')->group(function (){
    // Customer index
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index']) ->name('customer.index');
// Customer create
    Route::get('/create',[\App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
// Route luu du lieu create
    Route::post('/create', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
// Route hien thi view edit
    Route::get('/{id}/edit',[\App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
// Route update du lieu
    Route::put('/{id}/edit',[\App\Http\Controllers\CustomerController::class,'update'])->name('customer.update');
// Route de xoa du lieu
    Route::delete('/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy');
});

// Invoice
Route::prefix('invoice')->group(function (){
    Route::get('/', [\App\Http\Controllers\InvoiceController::class, 'index']) ->name('invoice.index');
    Route::get('/invoice/{id}', [\App\Http\Controllers\InvoiceController::class, 'updateStatus'])->name('invoice.updateStatus');
    Route::get('/invoice/pay/{id}', [\App\Http\Controllers\InvoiceController::class, 'mini'])->name('invoice.mini');
    Route::get('/invoice/restore/{id}', [\App\Http\Controllers\InvoiceController::class, 'restore'])->name('invoice.restore');
});

// Invoice Detail
Route::prefix('invoicedetail')->group(function (){
    Route::get('/{id}', [\App\Http\Controllers\InvoiceDetailedController::class, 'index']) ->name('invoicedetail.index');
    Route::get('/{id}/edit',[\App\Http\Controllers\InvoiceDetailedController::class, 'edit']) ->name('invoicedetail.edit');
    Route::put('/{id}/edit',[\App\Http\Controllers\InvoiceDetailedController::class]);

});

//Room
Route::prefix('/room')->group(function (){// Room index
    Route::get('/', [\App\Http\Controllers\RoomController::class, 'index']) ->name('room.index');
// Room create
    Route::get('/create',[\App\Http\Controllers\RoomController::class,'create'])->name('room.create');
// Luu du lieu create
    Route::post('/create', [\App\Http\Controllers\RoomController::class,'store'])->name('room.store');
// Room edit
    Route::get('/{id}/edit', [\App\Http\Controllers\RoomController::class, 'edit'])->name('room.edit');
// Room update
    Route::put('/{id}/edit',[\App\Http\Controllers\RoomController::class, 'update'])->name('room.update');
// Room dalete
    Route::delete('/{id}/destroy', [\App\Http\Controllers\RoomController::class, 'destroy'])->name('room.destroy');
});

//Type Room
Route::prefix('typeroom')->group(function (){
    // Type Room index
    Route::get('/', [\App\Http\Controllers\RoomTypeController::class, 'index']) ->name('typeroom.index');
// Type Room create
    Route::get('/create',[\App\Http\Controllers\RoomTypeController::class,'create'])->name('typeroom.create');
// Luu du lieu create
    Route::post('/create', [\App\Http\Controllers\RoomTypeController::class,'store'])->name('typeroom.store');
// Type Room edit
    Route::get('/{id}/edit', [\App\Http\Controllers\RoomTypeController::class, 'edit'])->name('typeroom.edit');
// Type Room update
    Route::put('/{id}/edit',[\App\Http\Controllers\RoomTypeController::class, 'update'])->name('typeroom.update');
// Type Room dalete
    Route::delete('/{id}/destroy', [\App\Http\Controllers\RoomTypeController::class, 'destroy'])->name('typeroom.destroy');
});

// Service
Route::prefix('service')->group(function (){
    // Service index
    Route::get('/',[\App\Http\Controllers\ServiceController::class,'index']) ->name('service.index');
// Service create
    Route::get('/create',[\App\Http\Controllers\ServiceController::class,'create'])->name('service.create');
// Luu du lieu create
    Route::post('/create',[\App\Http\Controllers\ServiceController::class, 'store'])->name('service.store');
//Service edit
    Route::get('/{id}/edit', [\App\Http\Controllers\ServiceController::class, 'edit'])->name('service.edit');
// Service update
    Route::put('/{id}/edit', [\App\Http\Controllers\ServiceController::class, 'update'])->name('room.update');
// Service delete
    Route::delete('/{id}', [\App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.destroy');
});

// Invoice Service
Route::prefix('serviceinvoice')->group(function (){
    Route::get('/', [\App\Http\Controllers\ServiceInvoiceController::class, 'index']) ->name('serviceinvoice.index');
});


// Home Page
Route::prefix('home')->group(function (){
    Route::get('/',[\App\Http\Controllers\HomeController::class, 'index']) ->name('home.index');
    Route::get('/booking',[\App\Http\Controllers\HomeController::class, 'booking']) ->name('home.booking');
    Route::post('/reservation',[\App\Http\Controllers\HomeController::class, 'store']) ->name('home.store');
});
// My booking
Route::prefix('home')->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('/booking/{customer_id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('home.booking');
//    Route::post('/reservation', [\App\Http\Controllers\HomeController::class, 'show'])->name('home.show');
});
// middlerware
Route::middleware('customerMiddleware')->prefix('Home')->group(function (){
    Route::get('/',[App\Http\Controllers\HomeController:: class, 'index'])->name('Home.index');
    Route::get('/booking/{customer_id}',[\App\Http\Controllers\HomeController::class, 'show']) ->name('Home.booking');
    Route::post('/reservation',[\App\Http\Controllers\HomeController::class, 'store']) ->name('Home.store');
    Route::get('/cancel-order/{order_id}', [\App\Http\Controllers\CustomerController::class, 'cancel'])->name('cancel.booking');

});
