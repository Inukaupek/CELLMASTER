<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="flex flex-col min-h-screen w-56 bg-white text-black">
        <ul class="mt-4">

            <li class="px-6 py-4 hover:bg-custom-blue">
                <a href="{{route('Drivers.index')}}">Dashboard</a>
            </li>
            <li class="px-6 py-4 hover:bg-custom-blue">
                <a href="{{route('Drivers.completedorders')}}">Success Orders</a>
            </li>
        </ul>
    </div>
