<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class CustomerCount extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Customer::count();
    }

    public function render()
    {
        return view('livewire.customer-count');
    }
}
