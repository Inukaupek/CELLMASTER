<!--get the name , address , email, contact number of the customer-->

<div class="p-11 w-4/5 bg-white ml-10 mt-8 ">

    <h1 class="text-2xl font-semibold custom-font-2 mb-3">
        Customers
    </h1>

<!--
    <div class="mb-4 px-11 mx-auto">
        <input type="text" wire:model="search" class="w-3/4 px-8 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-200" placeholder="Search customers...">
    </div>
-->

    <table class="min-w-full max-auto divide-y divide-gray-400 rounded-lg">
        <thead class="bg-custom-blue">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Address
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Contact
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($customers as $customer)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $customer->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $customer->address }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $customer->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $customer->contact }}
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

    <div class="mt-4 ">
        {{ $customers->links('pagination::tailwind') }}

    </div>
</div>
