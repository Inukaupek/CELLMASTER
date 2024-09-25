<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MobilePhones;
use Illuminate\Support\Facades\Auth;

class MobilePhonesTable extends Component
{
    public $mobilePhones;
    public $selectedProduct=null;

    // Fetch mobile phones added by the logged-in supplier
    public function mount()
    {
        $this->mobilePhones = MobilePhones::where('supplier_id', auth()->user()->id)->get();
    }

    // Method to view the product details


    public function render()
    {

        return view('livewire.mobile-phones-table');
    }
}
