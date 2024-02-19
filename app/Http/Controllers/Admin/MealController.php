<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MealRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index(){
        $meals = Product::get();

        return view('Dashboard.meals.index', compact('meals'));
    }

    public function create(){
        $items = Item::get();
        $categories = Category::get();

        return view('Dashboard.meals.create', compact('items', 'categories'));
    }

    public function store(MealRequest $request){
        $items = Item::whereIn('id', $request->item)->get();
        $calories = 0;
        $price = 0;
        $items->each(function($item) use (&$calories, $request, &$price){
            $calories += $item->calories * ($request->unit);
            $price += $item->price * ($request->quantity/$item->quantity);
        });

        $meal = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'displayed_price' => $request->displayed_price,
            'calories' => $calories,
            'actual_price' => $price,
        ]);

        $itemsWithQuantities = [];
        foreach ($request->item as $itemId) {
            $itemsWithQuantities[$itemId] = ['price' => $price, 'quantity' => $request->unit];
        }

        $meal->items()->sync($itemsWithQuantities);

        $meal->categories()->attach($request->category);

        return redirect()->route('admin.meals.index')->with('success', 'Meal is Created Successfully');
    }

    public function edit($id){
        $items = Item::get();
        $categories = Category::get();

        $meal = Product::find($id);

        return view('Dashboard.meals.update', compact('items', 'categories', 'meal'));
    }

    public function update(MealRequest $request, $id){
        $meal = Product::find($id);
        $meal->items()->detach();
        $meal->categories()->detach();
    
        $items = Item::whereIn('id', $request->item)->get();
        $calories = 0;
        $price = 0;
        $items->each(function($item) use (&$calories, $request, &$price){
            $calories += $item->calories * ($request->unit);
            $price += $item->price * ($request->quantity/$item->quantity);
        });

        $meal->update([
            'name' => $request->name,
            'description' => $request->description,
            'displayed_price' => $request->displayed_price,
            'calories' => $calories,
            'actual_price' => $price,
        ]);

        $itemsWithQuantities = [];
        foreach ($request->item as $itemId) {
            $itemsWithQuantities[$itemId] = ['price' => $price, 'quantity' => $request->unit];
        }

        $meal->items()->sync($itemsWithQuantities);

        $meal->categories()->attach($request->category);

        return redirect()->route('admin.meals.index')->with('success', 'Meal is Created Successfully');
    }

    public function show($id){
        $meal = Product::with(['categories', 'items'])->find($id);

        return view('Dashboard.meals.show', compact('meal'));
    }
}
