<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Repository;

interface ProductRepository extends Repository{

    public function createProductImage($images);
    public function createProductCategory($categories);
}
