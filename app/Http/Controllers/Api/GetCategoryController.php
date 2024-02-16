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

    public function index(){
        $categories = $this->categoryRepository->all();

        return response()->json([
            'message' => 'Categories retrieved successfully',
            'categories' => $categories,
        ], 200);
    }
}
