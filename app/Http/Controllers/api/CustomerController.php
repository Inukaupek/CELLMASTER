<?php

namespace App\Http\Controllers\api;

use App\Models\Customer;
use Illuminate\Http\Request;
use illuminate\Support\Facades\validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:customers',
            'contact' => 'required|digits:10',
            'password' => 'required|string|min:6',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);

        $token = $customer->createToken('customerToken')->plainTextToken;

        return response()->json([
            'message' => 'Customer registered successfully',
            'customer' => $customer,
            'token' => $token,
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if (!$customer || !Hash::check($request->password, $customer->password)) {
            return response()->json([
                'message' => 'Incorrect email or password',
            ], 401);
        }

        $token = $customer->createToken('customerToken')->plainTextToken;

        return response()->json([
            'message' => 'Customer logged in successfully',
            'customer' => $customer,
            'token' => $token,
        ], 200);
    }

    public function getCustomerCount()
    {
        $count = Customer::count();
        return response()->json(['count' => $count]);
    }
}
