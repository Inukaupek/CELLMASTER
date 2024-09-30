<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class CompletedOrders extends Component
{
    public $completedOrders;
    public $viewType;

    public function mount($viewType)
    {
        $this->viewType = $viewType;
        $this->loadCompletedOrders();
    }

    public function loadCompletedOrders()
    {
        switch ($this->viewType) {
            case 'admin':
                $this->getallcompletedorders();
                break;
            case 'supplier':
                $this->getsuppliercompletedorders();
                break;
            case 'driver':
                $this->getdrivercompletedorders();
                break;
            default:
                $this->getallcompletedorders();
        }
    }


    public function getsuppliercompletedorders()
    {
        $supplierID = Auth::user()->id;
        $this->completedOrders = Orders::where('supplier_id', $supplierID)
            ->where('order_status', 'Completed')
            ->get();
    }

    public function getdrivercompletedorders()
    {
        $driverID = Auth::user()->id;
        $this->completedOrders = Orders::where('driver_id', $driverID)
            ->where('order_status', 'Completed')
            ->get();
    }

    public function getallcompletedorders()
    {
        $this->completedOrders = Orders::where('order_status', 'Completed')->get();
    }

    public function render()
    {
        return view('livewire.completed-orders', [
            'orders' => $this->completedOrders,
        ]);
    }
}
