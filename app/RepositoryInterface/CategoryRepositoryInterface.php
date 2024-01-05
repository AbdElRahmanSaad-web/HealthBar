<?php

namespace App\RepositoryInterface;

interface CategoryRepositoryInterface{

    public function all();

    public function store($param);

    public function edit($id);
    
    public function update($param, $id);
}