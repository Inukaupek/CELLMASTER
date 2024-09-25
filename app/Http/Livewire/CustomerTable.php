<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class CustomerTable extends Component
{

    // get the user details from the Customer database
    public $customers;

    public function mount()
    {
        $this->customers = Customer::all();
    }

    //serach function
    public $search = '';  // Add a public property to hold the search term

    public function render()
    {
        // Filter customers based on the search input
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('contact', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.customer-table', ['customers' => $customers]);
    }


}
