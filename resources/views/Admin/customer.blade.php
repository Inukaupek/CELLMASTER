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
                <li class="px-6 py-4 hover:bg-custom-blue0">
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

        <livewire:customer-table />
</x-app-layout>
