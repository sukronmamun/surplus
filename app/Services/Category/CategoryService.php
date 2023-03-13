<?php

namespace App\Services\Category;

use LaravelEasyRepository\BaseService;

interface CategoryService extends BaseService{

    public function productByCategory(Int $id);
    public function store($source);
    public function update($source, $id);
}
