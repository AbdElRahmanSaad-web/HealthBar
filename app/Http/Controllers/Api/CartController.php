<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\MealResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::where('user_id', auth()->user()->id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Cart Retrieved successfully',
            'cart' => CartResource::collection($cart)
        ], 200);
    }
    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::findOrFail($request->product_id);
        $total_price = $product->displayed_price * $request->quantity;

        Cart::updateOrCreate(
            [
                'product_id' => $request->product_id,
                'user_id' => auth()->user()->id,
                'quantity' => $request->quantity,
            ],
            [
                'service_price' => 20,
                'price' => $total_price,
                'total_price' => $total_price +20,
            ]
        );

        return response()->json([
            'status' => true,
            'message' => 'Meal is added to cart successfully',
        ], 200);
    }


    public function deleteItem($id){
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return response()->json([
            'status' => true,
            'message' => 'Meal is removed from cart successfully',
        ], 200);
    }


    public function editToCart($id, Request $request){
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $cart = Cart::findOrFail($id);
        $total_price = $cart->product->displayed_price * $request->quantity;

        $cart->update([
            'quantity' => $request->quantity,
            'price' => $total_price,
            'total_price' => $total_price + 20,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Meal is updated successfully',
            'cart' => new CartResource($cart)
        ], 200);
    }



    public function checkoutCart(Request $request)
    {
        if (!Cache::has('address')) {
            return response()->json([
                'status' => false,
                'message' => 'Address is required',
            ], 200);
        }
        
        $address = Cache::get('address');
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        $total_price = 0;
    
        // Create order
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'address_id' => $address->id,
            'order_date' => now(),
            'service_price' => 20,
            'delivery_price' => 20,
            'notes' => $request->notes, 
        ]);
    
        // Create order details for each cart item
        foreach ($cartItems as $item) {
            $total_price += $item->total_price;
    
            $order->details()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total_price' => $item->total_price,
            ]);
        }
    
        // Update order total price
        $order->update([
            'total_price' => $total_price + 20 + 20,
            'total_price_after_discount' => $total_price + 20 + 20,
        ]);
    
        Cache::forget('address');
    
        return response()->json([
            'status' => true,
            'message' => 'Cart is ordered successfully',
            'order_id' => $order->id,
        ], 200);
    }    
}
