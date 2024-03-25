<?php

namespace App\Repository;

use App\Models\Order;
use App\RepositoryInterface\OrderRepositoryInterface;

class DBOrderRepository implements OrderRepositoryInterface {

    public function all(){
        return Order::all();
    }

    public function find($param){
        return Order::find($param);
    }

    public function store($param){
        return Order::create($param);
    }

    public function edit($id){
        return Order::find($id);
    }
    
    public function update($param, $id){
        $model = Order::find($id);
        return $model->update($param);
    }
}