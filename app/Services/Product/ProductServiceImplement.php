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


        if(empty($sources)){
          return [];
        }
        
          return $this->detailing($sources);
          
      } catch (\Exception $e) {
          Log::debug($e->getMessage());
          return [];
      }


  }

  public function detail(Int $id){

    try {
    
        $sources = $this->mainRepository->find($id);

        if(empty($sources)){
          return [];
        }

        return $this->detailing([$sources]);
        
    } catch (\Exception $e) {
        Log::debug($e->getMessage());
        return [];
    }
    
  }

  public function store($source)
  {
    
    try {
      $dataProduct = [
        "name" => $source->name,
        "Description" => $source->Description,
        "enable" => $source->enable,
      ];

      $response = $this->mainRepository->create($dataProduct);

      foreach ($source->images as $image) {
        $this->mainRepository->createProductImage([
          'product_id' => $response->id,
          'image_id' => $image['id'],
        ]);
      }
      foreach ($source->categories as $category) {
        $this->mainRepository->createProductCategory([
          'product_id' => $response->id,
          'category_id' => $category['id'],
        ]);
      }

      $dataProduct["id"] = $response->id;
      return $dataProduct; 

    } catch (\Exception $e) {
      Log::debug([
        $e->getMessage(),
        $e->getLine(),
      ]);
        return [];
    }

  }

  public function detailing($sources)
  {
    $ress = [];
        foreach ($sources as $source) {
            $temp = $source;
            $temp->categories = $source->categories;
            $temp->images = $source->images;
            array_push($ress, $temp);
        }

    return $ress;
  }

  public function update($source, $id)
  {

    $dataProduct = [
      "name" => $source->name,
      "Description" => $source->Description,
      "enable" => $source->enable,
    ];

    try {
      $this->mainRepository->update($id, $dataProduct);
  
      // delete Relation Table
      $this->mainRepository->deleteProductCategory($id);
      $this->mainRepository->deleteProductImage($id);
  
      // Recreated Images
      foreach ($source->images as $image) {
        $this->mainRepository->createProductImage([
          'product_id' => $id,
          'image_id' => $image['id'],
        ]);
      }
  
      // Recreated Category
      foreach ($source->categories as $category) {
        $this->mainRepository->createProductCategory([
          'product_id' =>  $id,
          'category_id' => $category['id'],
        ]);
      }
  
      $dataProduct["id"] = $id;
      return $dataProduct; 
    } catch (\Exception $e) {
      Log::debug([
        $e->getMessage(),
        $e->getLine(),
      ]);
        return [];
    }
  }

  public function delete($id)
  {

    
    try {
      // delete Product
      $this->mainRepository->delete($id);
       
      // delete Relation Table
      $this->mainRepository->deleteProductCategory($id);
      $this->mainRepository->deleteProductImage($id);
      
    } catch (\Exception $e) {
      Log::debug([
        $e->getMessage(),
        $e->getLine(),
      ]);
        return [];
    }
  }

}
