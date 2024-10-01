<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MobilePhones;

class AdminMobileTable extends Component
{
    use WithPagination;

    public function render()
    {

        $mobilePhones = MobilePhones::paginate(7);

        return view('livewire.admin-mobile-table', ['mobilePhones' => $mobilePhones]);
    }
}
