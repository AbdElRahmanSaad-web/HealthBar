<?php

namespace App\Repository;

use App\Models\Product;
use App\RepositoryInterface\MealRepositoryInterface;

class DBMealRepository implements MealRepositoryInterface {

    public function all(){
        return Product::all();
    }

    public function store($param){
        $meal = Product::create([
            'name' => $param['name'],
            'description' => $param['description'],
            'displayed_price' => $param['price'],
            'category_id' => $param['category_id'],
        ]);


        foreach ($param['items'] as $itemData) {
            $itemArray = json_decode($itemData['id'], true);

            $itemId = $itemArray['id'];
            $quantity = $itemData['quantity'];
            $price = $quantity * $itemArray['price'];

            $meal->items()->attach($itemId, ['quantity' => $quantity, 'price' => $price]);
        }

        return $meal;
    }

    public function edit($id){
        return Product::find($id);
    }
    
    public function update($param, $id){
        $model = Product::find($id);
        return $model->update($param);
    }
}