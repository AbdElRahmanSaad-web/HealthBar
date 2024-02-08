<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(UserRequest $request){
        $otp = rand('0000', '9999');
        // dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'otp' => $otp,
        ]);

        return response()->json([
            'message' => 'User Created Successfully',
            'user' => $user,
        ], 200); 
    }
}
