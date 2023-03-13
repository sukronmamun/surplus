<?php

namespace App\Repositories\Category;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Category;
use App\Models\CategoryProduct;

class CategoryRepositoryImplement extends Eloquent implements CategoryRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function deleteRelationProduct(Int $id)
    {
            return CategoryProduct::where("category_id",$id)->delete();
    }
}
