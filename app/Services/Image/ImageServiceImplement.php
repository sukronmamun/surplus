<?php

namespace App\Services\Image;

use LaravelEasyRepository\Service;
use App\Repositories\Image\ImageRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageServiceImplement extends Service implements ImageService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ImageRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function store($source)
    {
      try {
        $path = Storage::putFile('image', $source->file);
        
        $image = [
          'name' => basename($source->file->getClientOriginalName(), '.'.$source->file->getClientOriginalExtension()),
          'file' =>  $path,
          'enable' => 1,
        ];

        $ress = $this->mainRepository->create($image);
        $image['id'] = $ress->id;

        return $image;
      
      } catch (\Exception $e) {
        Log::debug([
          $e->getMessage(),
          $e->getLine(),
        ]);
          return [];
      }
      
      
    }



    // Define your custom methods :)
}
