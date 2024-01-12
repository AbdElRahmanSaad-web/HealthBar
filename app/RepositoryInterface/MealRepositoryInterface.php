<?php

namespace App\RepositoryInterface;

interface MealRepositoryInterface{

    public function all();

    public function store($param);

    public function edit($id);
    
    public function update($param, $id);
}