<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MobilePhones;

class AdminMobileTable extends Component
{
    public $mobilePhones;

    public function mount()
    {
        $this->mobilePhones = MobilePhones::all();

    }


    public function render()
    {
        return view('livewire.admin-mobile-table');
    }
}
