<x-app-layout>
    <x-admin-navigation />


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
