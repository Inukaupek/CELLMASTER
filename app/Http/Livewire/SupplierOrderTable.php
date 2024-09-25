<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class SupplierOrderTable extends Component
{

    public $orders;

    public function mount()
    {
        $supplierID = Auth::user()->id;

        $this->orders = Orders::where('supplier_id', $supplierID)
                      ->whereIn('order_status', ['send to supplier', 'on delivery'])
                      ->get();

    }


    public function render()
    {
        return view('livewire.supplier-order-table');
    }
}
