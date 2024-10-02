<div class="p-11 w-4/5 bg-white ml-10 mt-8 ">
    <h1 class="text-2xl font-semibold custom-font-2 mb-3">
        Mobile Phones
    </h1>


    <div class="flex justify-end pb-4">
        <a href="{{ route('Supplier.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded-md">Add an Item</a>
    </div>

    @if (session()->has('message'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 2000)"
        x-show="show"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="bg-green-500 text-white px-3 py-3 rounded mt-3  mb-3 min-w-full max-auto"
    >
        {{ session('message') }}
    </div>
@endif


    <table class="min-w-full max-auto divide-y divide-gray-400 rounded-lg">
        <thead class="bg-custom-blue">
            <tr>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Brand</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Price</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Quantity</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Availability</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($mobilePhones as $mobilePhone)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $mobilePhone->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $mobilePhone->brand }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $mobilePhone->price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $mobilePhone->quantity }}</td>
                    <td class="px-6 py-4 whitespace-nowrap item-center text-sm text-gray-500">
                        <div class="flex justify-center items-center">
                            @livewire('toggle-availability', ['mobilePhone' => $mobilePhone, 'key' => $mobilePhone->id])
                        </div>


                    </td>
                    <td class="pl-3 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                        <a href="{{ route('Supplier.show', $mobilePhone->id) }}" class="bg-green-500 text-white px-3 py-2 rounded-md">More</a>

                        <form action="{{ route('Supplier.destroy', $mobilePhone->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-md">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>





</div>
