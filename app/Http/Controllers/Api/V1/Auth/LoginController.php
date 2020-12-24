<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    

    public function showLoginForm()
    {
        return "Login Form";
    }

    public function login(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            // throw ValidationException::withMessages([
            //     'email' => ['The provided credentials are incorrect.'],
            // ]);

            return response([ 
				"succes" => false,
				"message" => "Sorry! Password does not match!"
			]);
        }

        return response([
			"success" => true,
			"access_token" => $user->createToken('AccessToken')->plainTextToken,
			"type"	=> "Bearer",
			"user"	=>	$user,
			"message" => "Congrats! You are logged in successfully!"
		]);
         
        
    }
    
}
