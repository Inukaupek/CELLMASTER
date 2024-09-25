<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SupplierTable extends Component
{
    public $users;

    public function mount(){

        //get the details that who are suppliers from the user table using user_role
        $this->users = User::where('user_role', 'supplier')->get();

    }

    public function render()
    {
        return view('livewire.supplier-table');
    }
}
