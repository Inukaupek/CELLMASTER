<div class="p-11 w-4/5 bg-white ml-10 mt-8 ">

    <!-- Add a button for adding new items -->
    <div class="flex justify-end pb-4">
        <a href="{{ route('Supplier.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded-md">Add an Item</a>
    </div>

    <!-- Table of mobile phones -->
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

                        <a href="" class="bg-red-500 text-white px-3 py-2 rounded-md">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>





</div>
