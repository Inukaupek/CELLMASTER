<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register (Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'user_role' => 'required|string|in:driver,supplier,admin',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
        ]);



        $user = new User();
        $user->name = $request->name;
        $user->user_role = $request->user_role;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->save();


        return redirect('/dashboard')->with('success','User created successfully');

    }
}
