<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="flex flex-col min-h-screen w-56 bg-white text-black">
            <ul class="mt-4">
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="{{route('Supplier.index')}}">Dashboard</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="">Customers</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="{{route('Supplier.products')}}">Products</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="{{route('Supplier.drivers')}}">Drivers</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="">Suppliers</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="">Orders</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="">Success Orders</a>
                </li>
            </ul>
        </div>

        <div class="p-11 w-4/5 bg-white ml-10 mt-8 ">

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">{{ $mobilePhone->name }}</h1>
        <div class="flex">
            <img src="{{ asset('storage/' . $mobilePhone->image) }}" alt="{{ $mobilePhone->name }}" class="w-1/3 rounded-md">
            <div class="ml-6">
                <p class="mb-4"><strong>Brand:</strong> {{ $mobilePhone->brand }}</p>
                <p class="mb-4"><strong>Description:</strong> {{ $mobilePhone->description }}</p>
                <div class="grid grid-cols-4 md:grid-cols-4 gap-6 mb-4">
                <p><strong>RAM:</strong> {{ $mobilePhone->ram }}</p>
                <p><strong>Storage:</strong> {{ $mobilePhone->storage }}</p>
                <p><strong>Camera:</strong> {{ $mobilePhone->camera }}</p>
                <p><strong>Display:</strong> {{ $mobilePhone->display }}</p>
                </div>
                <p class="mb-4"><strong>Price:</strong> LKR {{ $mobilePhone->price }}</p>
                <p class="mb-4"><strong>Quantity:</strong> {{ $mobilePhone->quantity }}</p>
                <p class="mb-4">
                    <strong>Availability:</strong>
                    <span class="{{ $mobilePhone->availability ? 'text-blue-500' : 'text-red-500' }}">
                        {{ $mobilePhone->availability ? 'In Stock' : 'Out of Stock' }}
                    </span>
                </p>
                <a href="{{ route('Supplier.products') }}" class="bg-custom-blue text-white px-3 py-2 rounded-md">Back</a>
                <a href="{{ route('Supplier.edit', $mobilePhone->id) }}" class="bg-yellow-400 text-white px-3 py-2 rounded-md">Edit</a>
            </div>


        </div>
    </div>
</x-app-layout>
