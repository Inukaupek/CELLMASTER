<div>
    @if (session()->has('message'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 2000)"
        x-show="show"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="bg-green-500 text-white px-3 py-3 rounded mt-3"
    >
        {{ session('message') }}
    </div>
@endif
    <div class="p-11 bg-white w-full mt-6">

    <form wire:submit.prevent="store" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <input type="text" wire:model="name" placeholder="Mobile Name" class="border p-2 rounded w-full">
        <input type="text" wire:model="brand" placeholder="Brand" class="border p-2 rounded w-full">
        </div>
        <textarea wire:model="description" placeholder="Description" class="border p-2 rounded w-full"></textarea>
        <div class="grid grid-cols-4 md:grid-cols-4 gap-6 mb-6">
        <input type="text" wire:model="ram" placeholder="RAM" class="border p-2 rounded w-full">
        <input type="text" wire:model="storage" placeholder="Storage" class="border p-2 rounded w-full">
        <input type="text" wire:model="camera" placeholder="Camera" class="border p-2 rounded w-full">
        <input type="text" wire:model="display" placeholder="Display" class="border p-2 rounded w-full">
        </div>

        <!-- File input for Image -->
        <input type="file" wire:model="image" class="border p-2 rounded w-full">
        @error('image') <span class="error">{{ $message }}</span> @enderror

        <input type="number" wire:model="price" placeholder="Price" class="border p-2 rounded w-full">
        <input type="number" wire:model="quantity" placeholder="Quantity" class="border p-2 rounded w-full">

        <!--availability available or not boolean-->
        <div class="flex items-center">
            <input type="checkbox" wire:model="availability" class="mr-2">
            <label for="availability">Availability</label>
        </div>

        <div class="px-11 flex justify-center">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Add Mobile Phone</button>
        </div>

    </form>


</div>
