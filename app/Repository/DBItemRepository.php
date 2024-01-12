<?php

namespace App\Repository;

use App\Models\Item;
use App\RepositoryInterface\ItemRepositoryInterface;

class DBItemRepository implements ItemRepositoryInterface {

    public function all(){
        return Item::all();
    }

    public function store($param){
        return Item::create($param);
    }

    public function edit($id){
        return Item::find($id);
    }
    
    public function update($param, $id){
        $model = Item::find($id);
        return $model->update($param);
    }
}