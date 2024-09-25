<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;

class PendingOrderTable extends Component
{

    //get the order details from the Order database
    public $orders;

    public function mount()
    {
        $this->orders = Orders::whereIn('order_status', ['Pending', 'send to supplier', 'on delivery'])->get();

    }


    public function render()
    {
        return view('livewire.pending-order-table');
    }
}
