<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'mobile_phone_id' => 'required|exists:mobile_phones,id',
            'quantity' => 'required|integer|min:1',
            'order_amount' => 'required|numeric|min:0',
            'date_of_order' => 'required|date',
        ]);

        // Store the order, ensuring only the date is saved
        $order = Orders::create([
            'customer_id' => $validatedData['customer_id'],
            'mobile_phone_id' => $validatedData['mobile_phone_id'],
            'quantity' => $validatedData['quantity'],
            'order_amount' => $validatedData['order_amount'],
            'date_of_order' => Carbon::parse($validatedData['date_of_order'])->toDateString(),
            'order_status' => 'Pending',
        ]);

        // Return the response
        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'order' => $order,
        ], 201);
    }


}
