<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class DriverTable extends Component
{
    public $drivers;

    public function mount()
    {

    //get the details about drivers
    $this->drivers = User::where('user_role','driver')->get();

    }



    public function render()
    {
        return view('livewire.driver-table');
    }
}
