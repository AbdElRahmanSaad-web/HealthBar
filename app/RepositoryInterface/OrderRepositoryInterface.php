<?php

namespace App\RepositoryInterface;

interface OrderRepositoryInterface{

    public function all();

    public function find($param);

    public function store($param);

    public function edit($id);
    
    public function update($param, $id);
}