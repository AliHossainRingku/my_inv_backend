<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{   

    public function showRegisterForm(Request $request)
    {
         return "Register Form";
    }
    
    public function register(Request $request)
    {
        //dd($request->all());
        $isValid = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6'],
        ]);
        if($isValid){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response([
                'success' => true,
                'message' => 'Successfully registered!',

            ]);
        }

        return response([
                'success' => false,
                'message' => 'Sorry not registered! Try again.',

            ]);
        
    }

    
}
