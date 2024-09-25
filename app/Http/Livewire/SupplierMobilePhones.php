<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MobilePhones;
use Illuminate\Support\Facades\Auth;

class SupplierMobilePhones extends Component
{
    use WithFileUploads;

    public $name, $brand, $description, $ram, $storage, $camera, $display, $image, $price, $quantity, $supplier_id, $availability=true;

    public function store()
    {
        $user = Auth::user();

        if ($user->user_role !== 'supplier') {
            session()->flash('error', 'Only suppliers are allowed to add mobile phones.');
            return;
        }

        $this->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string',
            'description' => 'required|string',
            'ram' => 'required|string',
            'storage' => 'required|string',
            'camera' => 'required|string',
            'display' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'availability' => 'boolean',

        ]);

        $filename = $this->image->store('uploads/mobilephones', 'public');

        MobilePhones::create([
            'name' => $this->name,
            'brand' => $this->brand,
            'description' => $this->description,
            'ram' => $this->ram,
            'storage' => $this->storage,
            'camera' => $this->camera,
            'display' => $this->display,
            'image' => $filename,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'supplier_id' => $user->id,
            'availability' => $this->availability,
        ]);

        session()->flash('message', 'Mobile phone added successfully.');
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->brand = '';
        $this->description = '';
        $this->ram = '';
        $this->storage = '';
        $this->camera = '';
        $this->display = '';
        $this->image = null;
        $this->price = '';
        $this->quantity = '';
        $this->availability = true;
    }




    public function render()
    {
        return view('livewire.supplier-mobile-phones');
    }
}
