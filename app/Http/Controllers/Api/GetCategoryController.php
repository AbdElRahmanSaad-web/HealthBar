<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\RepositoryInterface\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class GetCategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request){
        $categories = $this->categoryRepository->all();

        if($request->input('type') === 'sub'){
            $categories = $this->Child($categories);
        }else{
            $categories = $this->Parent($categories);
        }

        return response()->json([
            'status' => true,
            'message' => 'Categories retrieved successfully',
            'categories' => $categories,
        ], 200);
    }


    public function Parent($categories){
        return $categories->reject(function ($category) {
            return $category->MainCategory()->exists();
        });
    }

    public function Child($categories){
        return $categories->reject(function ($category) {
            return !$category->MainCategory()->exists();
        });
    }
}
