<?php

namespace App\Services\Product;

use LaravelEasyRepository\Service;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\Log;

class ProductServiceImplement extends Service implements ProductService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ProductRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function listAllData(){

      try {
      
        $sources = $this->mainRepository->all();
          $ress = [];
          foreach ($sources as $source) {
              $temp = $source;
              $temp->categories = $source->categories;
              $temp->images = $source->images;
              array_push($ress, $temp);
          }

          return $ress;
          
      } catch (\Exception $e) {
          Log::debug($e->getMessage());
          return [];
      }

      
  }
    // Define your custom methods :)
}
