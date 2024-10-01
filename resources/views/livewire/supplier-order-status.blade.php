<div class="p-11 w-4/5 bg-white ml-10 mt-8 ">



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

    <!-- Status update form -->
    <form wire:submit.prevent="updateOrderStatusAndAssignDriver">
        <div class="grid grid-cols-2 md:grid-cols-2 gap-6 mb-6">

            <div class="mb-4 p-6">
                <label for="driver" class="block text-sm font-medium text-gray-700">Assign Driver:/label>
                <select wire:model="driverId" id="driver" class="mt-1 block w-full border border-gray-300 rounded-md">
                    <option value="">Select a Driver:</option>
                    @foreach($drivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach
                </select>
            </div>



            <div class="mb-4 p-6">
            <label for="status" class="block text-sm font-medium text-gray-700">Order Status:</label>
            <select wire:model="status" id="status" class="mt-1 block w-full border border-gray-300 rounded-md">
                @foreach($statuses as $statusOption)
                    <option value="{{ $statusOption }}">{{ ucfirst($statusOption) }}</option>
                @endforeach
            </select>
        </div>
        </div>

        <!-- Submit button -->
        <div class="flex justify-center">
            <button type="submit" class="bg-custom-blue text-white px-4 py-2 rounded-md mr-3">
                Proceed
            </button>
            <a href="{{route('Supplier.orders')}}" class="bg-yellow-400 text-white px-3 py-2 rounded-md">Back</a>
        </div>
    </form>


</div>

