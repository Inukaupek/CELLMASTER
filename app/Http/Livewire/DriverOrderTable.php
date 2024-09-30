<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;


class DriverOrderTable extends Component
{

    public $orders;

    public function mount()
    {
        $this->loadOrders();


    }

    public function loadOrders()
    {
        $driverID = Auth::user()->id;

        $this->orders = Orders::where('driver_id', $driverID)
                      ->whereIn('order_status', ['on delivery'])
                      ->get();

    }

    public function updateOrderStatusCompleteOrder($orderId)
    {
        $order = Orders::find($orderId);
        if ($order) {
            $order->order_status = 'completed';
            $order->save();

            $this->loadOrders();

            session()->flash('message', 'Successfully Completed the Order');
        } else {
            session()->flash('error', 'Order not found');
        }
    }

    public function render()
    {
        return view('livewire.driver-order-table',[
            'statuses' => ['completed'],
        ]);

    }
}
