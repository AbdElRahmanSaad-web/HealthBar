<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\RepositoryInterface\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        $categories = $this->categoryRepository->all();
        return view('dashboard.admin.category.index', compact('categories'));
    }

    public function create(){
        return view('dashboard.admin.category.create');
    }

    public function store(CategoryRequest $request){
        $this->categoryRepository->store($request->all());

        return redirect()->route('categories.index')->with('success', 'Category is Created Successfully');
    }

    public function edit($id){
        $category = $this->categoryRepository->edit($id);
        
        return view('dashboard.admin.category.edit', compact('category'));
    }
   
    public function update(CategoryRequest $request, $id){
        $category = $this->categoryRepository->update($request->all(), $id);

        return redirect()->route('categories.index')->with('success', 'Category is Updated Successfully');
    }
}
