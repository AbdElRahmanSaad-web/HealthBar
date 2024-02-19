<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\RepositoryInterface\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        $sub_categories = $this->categoryRepository->all();

        $categories = $this->Child($sub_categories)??[];

        return view('Dashboard.category.sub_category.index', compact('categories'));
    }

    public function create(){
        $main_categories = $this->categoryRepository->all();

        $categories = $this->Parent($main_categories)??[];

        return view('Dashboard.category.sub_category.create', compact('categories'));
    }

    public function store(CategoryRequest $request){
        $category = $this->categoryRepository->store(['name' => $request->name]);
        
        $category->MainCategory()->attach($request->categories);

        return redirect()->route('admin.sub_categories.index')->with('success', 'Category is Created Successfully');
    }

    public function edit($id){
        $cat = $this->categoryRepository->edit($id);

        $main_categories = $this->categoryRepository->all();

        $categories = $this->Parent($main_categories)??[];
        
        return view('Dashboard.category.sub_category.edit', compact('cat', 'categories'));
    }
   

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->update(['name' => $request->name], $id);
        if (!$category) {
            return redirect()->back()->with('error', 'Failed to update category');
        }

        $category = $this->categoryRepository->find($id);

        $category->MainCategory()->sync($request->categories);

        return redirect()->route('admin.sub_categories.index')->with('success', 'Category is Updated Successfully');
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
