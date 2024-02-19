<?php

namespace App\Repository;

use App\Models\Category;
use App\RepositoryInterface\CategoryRepositoryInterface;

class DBCategoryRepository implements CategoryRepositoryInterface {

    public function all(){
        return Category::all();
    }

    public function find($param){
        return Category::find($param);
    }

    public function store($param){
        return Category::create($param);
    }

    public function edit($id){
        return Category::find($id);
    }
    
    public function update($param, $id){
        $model = Category::find($id);
        return $model->update($param);
    }
}