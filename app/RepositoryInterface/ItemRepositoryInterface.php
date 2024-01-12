<?php

namespace App\RepositoryInterface;

interface ItemRepositoryInterface{

    public function all();

    public function store($param);

    public function edit($id);
    
    public function update($param, $id);
}