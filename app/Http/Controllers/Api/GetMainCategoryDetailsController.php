<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class GetMainCategoryDetailsController extends Controller
{
    public function index(Request $request){

        $request->validate([
            'id' => 'required|exists:categories,id'
        ]);

        $category = Category::with(['SubCategory', 'SubCategory.Meals'])->where('id', $request->id)->first();

        if(!$category){
            return response()->json([
                'status' => false,
                'message' => 'Id is Wrong',
            ], 422);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Category is retrieved successfully',
            'categories' => CategoryResource::collection($category->SubCategory),
        ], 200);

    }
}
