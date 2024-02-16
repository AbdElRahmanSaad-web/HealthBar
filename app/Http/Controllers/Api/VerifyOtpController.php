<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyOtpController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:4',
        ]);

        $user = User::where('otp', $request->otp)->where('email', $request->email)->first();

        if(isset($user) && empty($user->email_verified_at)){
            $user->update([
                'email_verified_at' => Carbon::now(),
            ]);
        }else if(isset($user->email_verified_at)){
            return response()->json([
                'message' => 'Your Email is already Verified',
            ], 200);
            
        } else{
            return response()->json([
                'message' => 'Otp is Wrong',
            ], 422);            
        }

        return response()->json([
            'message' => 'User Email Verified Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200); 
        
    }
}
