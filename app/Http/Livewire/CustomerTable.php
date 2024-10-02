<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class CustomerTable extends Component
{
    use WithPagination;

    public $search = '';  // Property to hold the search term

    public function updatingSearch()
    {
        // This function will reset the page to 1 when the search term is updated
        $this->resetPage();
    }

    public function render()
    {
        // Fetch paginated customers based on the search input
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('contact', 'like', '%' . $this->search . '%')
            ->paginate(7);  // Change the number 8 to how many records you want per page

        return view('livewire.customer-table', ['customers' => $customers]);
    }
}
