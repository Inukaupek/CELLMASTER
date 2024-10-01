<div class="p-11 w-4/5 bg-white ml-10 mt-8 ">

    <h1 class="text-2xl font-semibold custom-font-2 mb-3">
        Orders
    </h1>

    <!-- Table of mobile phones -->
    <table class="min-w-full max-auto divide-y divide-gray-400 rounded-lg">
        <thead class="bg-custom-blue">
            <tr>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Customer Name</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Mobile Phone</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Quantity</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Order Amount</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Driver</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Order Status</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($orders as $order)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $order->customer->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $order->mobile_phone->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $order->quantity }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $order->order_amount }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ optional($order->driver)->name ?? ' ' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $order->order_status }}</td>
                    <td class="pl-3 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                        <a href="{{route('Supplier.proceed',$order->id)}}" class="bg-green-500 text-white px-3 py-2 rounded-md">Proceed</a>

                        <a href="" class="bg-red-500 text-white px-3 py-2 rounded-md">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>





</div>
