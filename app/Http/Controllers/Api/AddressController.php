<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function addAddress(Request $request){

        if($request->has('id')){
            $address = Address::findOrFail($request->id);
        }

        $validator = Validator::make($request->all(), [
            'type' => 'required|in:home,work,other',
            'address' => 'required|string|max:255',
            'floor_number' => 'nullable|string',
            'villa_number' => 'nullable|string',
            'apartment_number' => 'nullable|string',
            'landmark' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:11',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $address = Address::create([
            'type' => $request->type,
            'address' =>$request->address,
            'floor_number' => $request->floor_number,
            'villa_number' => $request->villa_number,
            'apartment_number' => $request->apartment_number,
            'landmark' => $request->landmark,
            'phone_number' => $request->phone_number,
            'user_id' => auth()->user()->id
        ]);
        Cache::put('address', $address);
        return response()->json(['message' => 'Address stored successfully'], 200);
    }
}
