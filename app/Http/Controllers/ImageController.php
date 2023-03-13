<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Services\Image\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    private $imageService;
    
    public function __construct(ImageService $imageService) {
        $this->imageService = $imageService;
    }


    public function upload(ImageRequest $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000'
            ]);

        $result = $this->imageService->store($request);

        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    }

    public function getimage($path)
    {
        $image = Storage::get($path);
        return response($image, 200)->header('Content-Type', Storage::mimeType($path));
    }
}