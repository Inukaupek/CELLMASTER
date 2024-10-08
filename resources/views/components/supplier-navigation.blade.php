<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="flex flex-col min-h-screen w-56 bg-white text-black">
        <ul class="mt-4">
            <li class="px-6 py-4 hover:bg-custom-blue">
                <a href="{{route('Supplier.products')}}">Products</a>
            </li>
            <li class="px-6 py-4 hover:bg-custom-blue">
                <a href="{{route('Supplier.drivers')}}">Drivers</a>
            </li>
            <li class="px-6 py-4 hover:bg-custom-blue">
                <a href="{{route('Supplier.orders')}}">Orders</a>
            </li>
            <li class="px-6 py-4 hover:bg-custom-blue">
                <a href="{{route('Supplier.completedorders')}}">Success Orders</a>
            </li>
        </ul>
    </div>
