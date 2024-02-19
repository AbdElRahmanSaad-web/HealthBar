<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required',
            'password' => 'required|min:6',
            'confirmation_password' => 'required|same:password',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['status' => false,'errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->where('otp', $request->otp)->first();

        if(empty($user)){
            return response()->json(['status' => false, 'message' => 'Otp is Worng']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Password Changed Successfully',
        ], 200);
    }
}
