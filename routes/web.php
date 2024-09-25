<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CustomerTable;
use App\Http\Livewire\SupplierMobilePhones;
use App\Http\Controllers\MobilePhoneController;




Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);

Route::get('admin/dashboard',[UserController::class,'index'])->name('admin.index')->middleware(['auth','role:admin']);
Route::get('/admin/customers', [UserController::class,'showCustomers'])->name('admin.customer')->middleware(['auth','role:admin']);
Route::get('/admin/suppliers', [UserController::class,'showSuppliers'])->name('admin.suppliers')->middleware(['auth','role:admin']);
Route::get('/admin/products', [UserController::class,'showAdminProducts'])->name('admin.products')->middleware(['auth','role:admin']);
Route::get('admin/drivers', [UserController::class,'showDrivers'])->name('admin.drivers')->middleware(['auth', 'role:admin']);
Route::get('/admin/orders', [UserController::class,'showOrders'])->name('admin.orders')->middleware(['auth','role:admin']);
Route::get('/admin/assignsupplier/{order}', [UserController::class,'assignsupplier'])->name('admin.proceed')->middleware(['auth','role:admin']);


Route::get('/supplier/dashboard',[UserController::class,'Showsupplierdashboard'])->name('Supplier.index')->middleware(['auth','role:supplier']);
Route::get('/supplier/products',[UserController::class,'ShowProducts'])->name('Supplier.products')->middleware(['auth','role:supplier']);
Route::get('/supplier/create',[UserController::class,'createproduct'])->name('Supplier.create')->middleware(['auth','role:supplier']);
Route::get('/mobilephones/{id}', [MobilePhoneController::class, 'show'])->name('Supplier.show')->middleware(['auth','role:supplier']);
Route::get('/mobilephones/{id}/edit', [MobilePhoneController::class, 'edit'])->name('Supplier.edit')->middleware(['auth','role:supplier']);
Route::put('/mobilephones/{id}', [MobilePhoneController::class, 'update'])->name('Supplier.update')->middleware(['auth','role:supplier']);
Route::get('supplier/drivers', [UserController::class,'showDriverstosupplier'])->name('Supplier.drivers')->middleware(['auth', 'role:supplier']);
Route::get('/supplier/orders', [UserController::class,'showSupplierOrders'])->name('Supplier.orders')->middleware(['auth','role:supplier']);
Route::get('/supplier/assigndriver/{order}', [UserController::class,'assigndriver'])->name('Supplier.proceed')->middleware(['auth','role:supplier']);





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





