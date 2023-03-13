<?php

namespace App\Services\Product;

use LaravelEasyRepository\BaseService;

interface ProductService extends BaseService{

    public function listAllData();
    
    public function detail(Int $id);

    public function detailing($sources);
    public function store($source);
    public function update($source, $id);
    public function delete($id);
}
