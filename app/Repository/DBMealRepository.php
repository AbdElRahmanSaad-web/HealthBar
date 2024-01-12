<?php

namespace App\Repository;

use App\Models\Product;
use App\RepositoryInterface\MealRepositoryInterface;

class DBMealRepository implements MealRepositoryInterface {

    public function all(){
        return Product::all();
    }

    public function store($param){
        return Product::create($param);
    }

    public function edit($id){
        return Product::find($id);
    }
    
    public function update($param, $id){
        $model = Product::find($id);
        return $model->update($param);
    }
}