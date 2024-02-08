<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{
    public function index(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Generate a random OTP (assuming 4 digits)
        $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Update the user's OTP
        $user = User::where('email', $request->email)->first();
        $user->update(['otp' => $otp, 'email_verified_at' => null]);

        // Delete all existing tokens associated with the user
        $user->tokens()->delete();

        return response()->json([
            'message' => 'OTP generated successfully',
            'otp' => $otp,
        ], 200);
    }
}
