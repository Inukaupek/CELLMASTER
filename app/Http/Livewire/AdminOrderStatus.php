<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;
use App\Models\User;

class AdminOrderStatus extends Component
{
    public $order;
    public $status;
    public $supplierId;
    public $suppliers;

    public function mount($order)
    {
        $this->order = $order;
        $this->status = $order->order_status;
        $this->supplierId = $order->supplier_id;
        $this->suppliers = User::where('user_role', 'supplier')->get();
    }

    public function updateOrderStatusAndAssignSupplier()
    {
        $order = Orders::find($this->order->id);
        $order->order_status = $this->status;
        $order->supplier_id = $this->supplierId;
        $order->save();



        session()->flash('message', 'Successfully Plced the Order to the Supplier');

    }


    public function render()
    {
        return view('livewire.admin-order-status',[
            'statuses' => ['pending', 'send to supplier', 'on delivery'],
        ]);
    }
}
