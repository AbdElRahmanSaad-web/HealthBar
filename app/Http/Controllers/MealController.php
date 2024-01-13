<?php

namespace App\Http\Controllers;

use App\RepositoryInterface\CategoryRepositoryInterface;
use App\RepositoryInterface\ItemRepositoryInterface;
use App\RepositoryInterface\MealRepositoryInterface;
use Illuminate\Http\Request;

class MealController extends Controller
{
    private $mealRepository;

    public function __construct(MealRepositoryInterface $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }

    public function index(){
        $meals = $this->mealRepository->all();
        $calories = 0;
        $meals->each(function ($meal) use (&$calories){
            $meal->Items->each(function($item) use (&$calories){
                $calories += $item->calories;
            });
        });
        return view('dashboard.admin.meal.index', compact('meals', 'calories'));
    }


    public function create(CategoryRepositoryInterface $categoriesInterface, ItemRepositoryInterface $itemsInterface){
        $categories = $categoriesInterface->all();
        $items = $itemsInterface->all();
    
        return view('dashboard.admin.meal.create', compact('categories', 'items'));
    }

    public function store(Request $request){
        $this->mealRepository->store($request->all());

        return redirect()->route('meals.index')->with('success', 'Meal is Created Successfully');
    }

    public function edit($id, CategoryRepositoryInterface $categoriesInterface, ItemRepositoryInterface $itemsInterface){
        $meal = $this->mealRepository->edit($id);
        $categories = $categoriesInterface->all();
        $items = $itemsInterface->all();
        
        return view('dashboard.admin.meal.edit', compact('meal', 'items', 'categories'));
    }
   
    public function update(Request $request, $id){
        $item = $this->mealRepository->update($request->all(), $id);

        return redirect()->route('meals.index')->with('success', 'Meal is Updated Successfully');
    }

}
