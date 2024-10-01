<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CustomerTable;
use App\Http\Livewire\SupplierMobilePhones;
use App\Http\Controllers\MobilePhoneController;




Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [UserController::class,'index'])->name('admin.index');
    Route::get('/admin/customers', [UserController::class,'showCustomers'])->name('admin.customer');
    Route::get('/admin/suppliers', [UserController::class,'showSuppliers'])->name('admin.suppliers');
    Route::get('/admin/products', [UserController::class,'showAdminProducts'])->name('admin.products');
    Route::get('admin/drivers', [UserController::class,'showDrivers'])->name('admin.drivers');
    Route::get('/admin/orders', [UserController::class,'showOrders'])->name('admin.orders');
    Route::get('/admin/assignsupplier/{order}', [UserController::class,'assignsupplier'])->name('admin.proceed');
    Route::get('/admin/completedorders', [UserController::class,'showCompletedOrders'])->name('admin.completedorders');
});


Route::middleware(['auth', 'role:supplier'])->group(function () {
    Route::get('/supplier/dashboard', [UserController::class,'Showsupplierdashboard'])->name('Supplier.index');
    Route::get('/supplier/products', [UserController::class,'ShowProducts'])->name('Supplier.products');
    Route::get('/supplier/create', [UserController::class,'createproduct'])->name('Supplier.create');
    Route::get('/mobilephones/{id}/edit', [MobilePhoneController::class, 'edit'])->name('Supplier.edit');
    Route::put('/mobilephones/{id}', [MobilePhoneController::class, 'update'])->name('Supplier.update');
    Route::get('supplier/drivers', [UserController::class,'showDriverstosupplier'])->name('Supplier.drivers');
    Route::get('/supplier/orders', [UserController::class,'showSupplierOrders'])->name('Supplier.orders');
    Route::get('/supplier/assigndriver/{order}', [UserController::class,'assigndriver'])->name('Supplier.proceed');
    Route::get('/supplier/completedorders', [UserController::class,'showsupplierCompletedOrders'])->name('Supplier.completedorders');
});


Route::middleware(['auth', 'role:driver'])->group(function () {
    Route::get('/Drivers/index', [UserController::class,'driverindex'])->name('Drivers.index');
    Route::get('/Driver/orders', [UserController::class,'showDriverOrders'])->name('Drivers.index');
    Route::get('/Driver/completedorders', [UserController::class,'showdriverompletedOrders'])->name('Drivers.completedorders');
});


    Route::get('/mobilephones/{id}', [MobilePhoneController::class, 'show'])->name('Supplier.show')->middleware('auth', 'role:supplier,admin');





Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});





