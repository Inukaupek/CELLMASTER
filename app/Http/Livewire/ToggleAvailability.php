<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MobilePhones;

class ToggleAvailability extends Component
{
    public $mobilePhone;
    public $availability;

    public function mount(MobilePhones $mobilePhone)
    {
        // Initialize the component with the mobile phone data and availability status
        $this->mobilePhone = $mobilePhone;
        $this->availability = $mobilePhone->availability;
    }

    public function toggleAvailability()
    {
        // Toggle the availability status
        $this->availability = !$this->availability;

        // Update the availability in the database
        $this->mobilePhone->update(['availability' => $this->availability]);

        session()->flash('message', 'Product availability updated successfully.');
    }

    public function render()
    {
        return view('livewire.toggle-availability');
    }
}

