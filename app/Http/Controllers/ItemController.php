<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        $categories = $this->categoryRepository->all()->whereNotNull('category_id');

        return view('dashboard.admin.category.sub_category.index', compact('categories'));
    }

    public function create(){
        $categories = $this->categoryRepository->all()->whereNull('category_id');

        return view('dashboard.admin.category.sub_category.create', compact('categories'));
    }

    public function store(CategoryRequest $request){
        $this->categoryRepository->store($request->all());

        return redirect()->route('sub_categories.index')->with('success', 'Category is Created Successfully');
    }

    public function edit($id){
        $cat = $this->categoryRepository->edit($id);

        $categories = $this->categoryRepository->all()->whereNull('category_id');

        
        return view('dashboard.admin.category.sub_category.edit', compact('cat', 'categories'));
    }
   
    public function update(CategoryRequest $request, $id){
        $category = $this->categoryRepository->update($request->all(), $id);

        return redirect()->route('sub_categories.index')->with('success', 'Category is Updated Successfully');
    }
}

