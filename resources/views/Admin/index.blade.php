<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="flex flex-col min-h-screen w-56 bg-white text-black">
            <ul class="mt-4">
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="{{route('admin.index')}}">Dashboard</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="{{route('admin.customer')}}">Customers</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="{{route('admin.products')}}">Products</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="{{route('admin.drivers')}}">Drivers</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="{{route('admin.suppliers')}}">Suppliers</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="">Orders</a>
                </li>
                <li class="px-6 py-4 hover:bg-custom-blue">
                    <a href="">Success Orders</a>
                </li>
            </ul>
        </div>



        <!-- Content -->
        <div class="flex-1 p-6">
            <!-- Top Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                @livewire('customer-count')

                <div class="bg-green-500 shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold">5</h2>
                    <p>Pending Orders</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold">15</h2>
                    <p>Completed Orders</p>
                </div>
            </div>

            <!-- Dynamic content area (Livewire) -->
            <div>
                @yield('content')
            </div>
        </div>

</x-app-layout>
