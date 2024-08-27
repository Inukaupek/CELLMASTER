<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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



        return redirect('/')->with('success','You have successfully registered');
    }

    public function login(Request $request){
        //validations
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        //check if user exists
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return back()->with('error','Invalid credentials');
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            if($user->user_role == 'admin'){
                return redirect('admin/dashboard');
            }else{
                return redirect('dashboard');
            }
        }
        return back()->with('error','Invalid credentials');
    }

    public function index(){
        return view('Admin.index');
    }
}
