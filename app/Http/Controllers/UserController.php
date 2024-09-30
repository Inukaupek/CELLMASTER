<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;


class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'user_role' => 'required|string|in:driver,supplier,admin',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone_number' => 'required|string|unique:users|regex:/^[0-9]{10,15}$/',
            'password' => [
                'required',
                'string',
                'min:8', // Minimum 8 characters
                'regex:/[a-z]/', // At least one lowercase letter
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[0-9]/', // At least one number
                'regex:/[@$!%*?&#]/', // At least one special character
            ],
        ], [
            // Custom error messages
            'name.required' => 'Name is required.',
            'user_role.required' => 'User role is required.',
            'address.required' => 'Address is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'This email is already registered.',
            'phone_number.required' => 'Phone number is required.',
            'phone_number.regex' => 'Phone number must be between 10 to 15 digits.',
            'password.required' => 'Password is required.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);

        // Create new user
        $user = new User();
        $user->name = $request->name;
        $user->user_role = $request->user_role;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/')->with('success', 'You have successfully registered');
    }

    public function login(Request $request)
    {
        // Validation rules
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ], [
            // Custom error messages
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password is Incorrect.',
        ]);

        // Check if the user exists
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        // Authenticate user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->user_role == 'admin') {
                return redirect('admin/dashboard');
            } else if ($user->user_role == 'supplier') {
                return redirect('supplier/products');
            } else if($user->user_role == 'driver'){
                return redirect('Drivers/index');

            } else{
                return redirect('dashboard');

        }
        }

        // Invalid credentials message
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }



    public function index(){
        return view('Admin.index');
    }

    public function showCustomers(){
        return view('Admin.customer');
    }

    public function showSuppliers(){
        return view('Admin.suppliers');
    }

    public function Showsupplierdashboard(){
        return view('Supplier.index');
    }

    public function ShowProducts(){
        return view('Supplier.products');
    }

    public function createproduct(){
        return view('Supplier.create');
    }

    public function showAdminProducts(){
        return view('Admin.products');
    }

    public function showDrivers(){
        return view('Admin.drivers');
    }

    public function showDriverstosupplier(){
        return view('Supplier.drivers');
    }

    public function showOrders(){
        return view('Admin.orders');
    }

    public function assignsupplier($orderId){
        $order = Orders::findOrFail($orderId);

        return view('Admin.proceed', compact('order'));
    }

    public function showSupplierOrders(){
        return view('Supplier.orders');
    }

    public function assigndriver($orderId){
        $order = Orders::findOrFail($orderId);

        return view('Supplier.proceed', compact('order'));
    }

    public function driverindex(){
        return view('Drivers.index');
    }

    public function showDriverOrders(){
        return view('Drivers.index');
    }

    public function showCompletedOrders(){
        return view('Admin.completedorders');
    }

    public function showsupplierCompletedOrders(){
        return view('Supplier.completedorders');
    }

    public function showdriverompletedOrders(){
        return view('Drivers.completedorders');
    }

}
