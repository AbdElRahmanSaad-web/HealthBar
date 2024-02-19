<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Models\Product;
use App\RepositoryInterface\MealRepositoryInterface;
use Illuminate\Http\Request;

class GetMainDishController extends Controller
{
    private $mealRepository;

    public function __construct(MealRepositoryInterface $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }
    public function index(){
        $meals = Product::whereHas('categories', function ($q){
            $q->where('name', 'like', 'اطباق رئيسية');
        })->get();

        return response()->json([
            'status' => true,
            'message' => 'Meals Retrieved Successfully',
            'meals' => MealResource::collection($meals),
        ], 200); 
    }
}
