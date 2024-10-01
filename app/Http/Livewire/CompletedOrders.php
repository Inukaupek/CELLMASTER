<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class CompletedOrders extends Component
{
    use WithPagination; // Livewire pagination trait

    public $viewType;

    public function mount($viewType)
    {
        $this->viewType = $viewType;
    }


    public function getsuppliercompletedorders()
    {
        $supplierID = Auth::user()->id;
        return Orders::where('supplier_id', $supplierID)
            ->where('order_status', 'Completed')
            ->paginate(8);
    }

    public function getdrivercompletedorders()
    {
        $driverID = Auth::user()->id;
        return Orders::where('driver_id', $driverID)
            ->where('order_status', 'Completed')
            ->paginate(8);
    }

    public function getallcompletedorders()
    {
        return Orders::where('order_status', 'Completed')->paginate(8);
    }

    public function render()
    {
        $orders = null;

        // Fetch orders based on viewType
        switch ($this->viewType) {
            case 'admin':
                $orders = $this->getallcompletedorders();
                break;
            case 'supplier':
                $orders = $this->getsuppliercompletedorders();
                break;
            case 'driver':
                $orders = $this->getdrivercompletedorders();
                break;
            default:
                $orders = $this->getallcompletedorders();
        }

        // Pass orders to the view
        return view('livewire.completed-orders', [
            'orders' => $orders,
        ]);
    }
}
