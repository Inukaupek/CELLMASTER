<!--get the name , address , email, contact number of the customer-->

<div class="p-11 w-4/5 bg-white ml-10 mt-8 ">

<!-- title Mobile Phones h1 -->
<h1 class="text-2xl font-semibold custom-font-2 mb-3">
    Mobile Phones
</h1>

    <table class="min-w-full max-auto divide-y divide-gray-400 rounded-lg">
        <thead class="bg-custom-blue">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Brand
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Price
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Supplier
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Availability
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($mobilePhones as $mobilePhone)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $mobilePhone->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $mobilePhone->brand }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $mobilePhone->price }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $mobilePhone->quantity }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $mobilePhone->supplier->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap item-center text-sm text-gray-500">
                        {{ $mobilePhone->availability ? 'In Stock' : 'Out of Stock' }}
                    </td>
                    <td class="pl-3 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                        <a href="{{route('Supplier.show',$mobilePhone->id)}}" class="bg-green-500 text-white px-4 py-2 rounded-md mr-3">View More</a>
                        <a href="" class="bg-red-500 text-white px-4 py-2 rounded-md">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 ">
        {{ $mobilePhones->links('pagination::tailwind') }}
    </div>
</div>
