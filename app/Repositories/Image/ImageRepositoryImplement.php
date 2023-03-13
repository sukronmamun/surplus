<?php

namespace App\Repositories\Image;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Image;

class ImageRepositoryImplement extends Eloquent implements ImageRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Image $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
