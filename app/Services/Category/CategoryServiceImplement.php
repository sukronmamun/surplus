<?php

namespace App\Services\Category;

use LaravelEasyRepository\Service;
use App\Repositories\Category\CategoryRepository;

class CategoryServiceImplement extends Service implements CategoryService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(CategoryRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function productByCategory(Int $id)
    {

      $sources = [$this->mainRepository->find($id)];
      
      return $this->detailing($sources);
    }

    public function detailing($sources)
    {
      $ress = [];
          foreach ($sources as $source) {
              $temp = $source;
              $temp->products = $source->products;
              array_push($ress, $temp);
          }
  
      return $ress;
    }
}
