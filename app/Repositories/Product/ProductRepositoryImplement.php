<?php

namespace App\Repositories\Product;

use App\Models\CategoryProduct;
use App\Models\ImageProduct;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;

class ProductRepositoryImplement extends Eloquent implements ProductRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function createProductImage($images)
    {
        return ImageProduct::create($images);
    }
    
    public function createProductCategory($categories)
    {
        return CategoryProduct::create($categories);
    }

    

    
    // Write something awesome :)
}
