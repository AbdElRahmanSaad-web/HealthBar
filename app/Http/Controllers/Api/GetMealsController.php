<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class GetMealsController extends Controller
{
    public function index(){
        $meals = Product::get();
    }
}
