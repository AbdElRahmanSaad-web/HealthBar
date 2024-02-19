<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $main_categories = $this->categoryRepository->all();

        $categories = $this->Parent($main_categories)??[];
        
        return view('Dashboard.category.index', compact('categories'));
    }

    public function create(){
        return view('Dashboard.category.create');
    }

    public function store(CategoryRequest $request){
        $this->categoryRepository->store($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category is Created Successfully');
    }

    public function edit($id){
        $category = $this->categoryRepository->edit($id);
        
        return view('Dashboard.category.edit', compact('category'));
    }
   
    public function update(CategoryRequest $request, $id){
        $category = $this->categoryRepository->update($request->all(), $id);

        return redirect()->route('admin.categories.index')->with('success', 'Category is Updated Successfully');
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
