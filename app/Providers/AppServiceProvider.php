<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('customer-count', \App\Http\Livewire\CustomerCount::class);
        Livewire::component('customer-table', \App\Http\Livewire\CustomerTable::class);
        Livewire::component('supplier-table', \App\Http\Livewire\SupplierTable::class);
        Livewire::component('supplier-mobile-phones', \App\Http\Livewire\SupplierMobilePhones::class);
        Livewire::component('mobile-phones-table', \App\Http\Livewire\MobilePhonesTable::class);
        Livewire::component('toggle-availability', \App\Http\Livewire\ToggleAvailability::class);
        Livewire::component('admin-mobile-table', \App\Http\Livewire\AdminMobileTable::class);
        Livewire::component('driver-table', \App\Http\Livewire\DriverTable::class);
        Livewire::component('pending-order-table', \App\Http\Livewire\PendingOrderTable::class);
        Livewire::component('admin-order-status', \App\Http\Livewire\AdminOrderStatus::class);
        Livewire::component('supplier-order-status', \App\Http\Livewire\SupplierOrderStatus::class);
        Livewire::component('supplier-order-table', \App\Http\Livewire\SupplierOrderTable::class);
        Livewire::component('driver-order-table', \App\Http\Livewire\DriverOrderTable::class);
        Livewire::component('completed-orders', \App\Http\Livewire\CompletedOrders::class);

    }
}
