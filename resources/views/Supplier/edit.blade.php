<x-app-layout>

    <x-supplier-navigation />
        <div class="p-11 w-4/5 bg-white ml-10 mt-8 ">

            @if (session()->has('message'))
            <div class="bg-green-500 text-white px-3 py-3 rounded mt-3">
                {{ session('message') }}
            </div>
        @endif
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Edit {{ $mobilePhone->name }}</h1>
        <form action="{{ route('Supplier.update', $mobilePhone->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" id="name" name="name" value="{{ $mobilePhone->name }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="brand" class="block text-gray-700">Brand:</label>
                <input type="text" id="brand" name="brand" value="{{ $mobilePhone->brand }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea id="description" name="description" rows ="4" class="w-full p-2 border border-gray-300 rounded-md">{{ $mobilePhone->description }}</textarea>
            </div>

            <!-- add other field ram,storage,camera,display-->
            <div class="mb-4">
                <label for="ram" class="block text-gray-700">Ram:</label>
                <input type="text" id="ram" name="ram" value="{{ $mobilePhone->ram }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="storage" class="block text-gray-700">Storage:</label>
                <input type="text" id="storage" name="storage" value="{{ $mobilePhone->storage }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="camera" class="block text-gray-700">Camera:</label>
                <input type="text" id="camera" name="camera" value="{{ $mobilePhone->camera }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="display" class="block text-gray-700">Display:</label>
                <input type="text" id="display" name="display" value="{{ $mobilePhone->display }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image:</label>
                <input type="file" id="image" name="image" class="w-full p-2 border border-gray-300 rounded-md">
                @if ($mobilePhone->image)
                    <img src="{{ asset('storage/' . $mobilePhone->image) }}" alt="Product Image" class="w-32 mt-2">
                @endif
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price:</label>
                <input type="number" id="price" name="price" value="{{ $mobilePhone->price }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-700">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="{{ $mobilePhone->quantity }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- stock availability -->
<div class="mb-4">
    <label for="availability">Availability</label>
    <input type="hidden" name="availability" value="0"> <!-- Default unchecked value -->
    <input type="checkbox" id="availability" name="availability" value="1" {{ $mobilePhone->availability ? 'checked' : '' }} class="mr-2">
</div>




            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Mobile Phone</button>
        </form>
    </div>
</x-app-layout>
