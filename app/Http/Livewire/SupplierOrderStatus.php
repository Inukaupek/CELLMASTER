<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SupplierOrderStatus extends Component
{

    public $order;
    public $status;
    public $driverId;
    public $drivers;

    public function mount($order)
    {


        $this->order = $order;
        $this->status = $order->order_status;
        $this->driverId = $order->driver_id;
        $this->drivers = User::where('user_role', 'driver')->get();
    }

    public function updateOrderStatusAndAssignDriver()
    {
        $order = Orders::find($this->order->id);
        $order->order_status = $this->status;
        $order->driver_id = $this->driverId;
        $order->save();

        session()->flash('message', 'Successfully Placed the Order to the Driver');

    }



    public function render()
    {
        return view('livewire.supplier-order-status',[
            'statuses' => ['send to supplier', 'on delivery'],
        ]);


    }
}
