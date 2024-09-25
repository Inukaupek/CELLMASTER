<x-app-layout>
    <x-supplier-navigation />
        <div class="p-11 w-4/5 bg-white ml-10 mt-8 ">
            <h1 class="text-2xl font-bold mb-6">Order Details</h1>
            <table class="min-w-full max-auto divide-y divide-gray-400 rounded-lg">
                <thead class="bg-custom-blue">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Customer Name
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Address
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Contact Number
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Order Date
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Order Amount
                        </th>


                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->customer->name }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->customer->address }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $order->customer->contact }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $order->mobile_phone->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $order->date_of_order }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $order->quantity }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $order->order_amount }}
                            </td>
                        </tr>

                </tbody>

            </table>



            <!-- Call Livewire component for updating the order status and assigning a supplier -->
            @livewire('supplier-order-status', ['order' => $order])
        </div>
</x-app-layout>
