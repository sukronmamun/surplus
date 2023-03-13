<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;
    protected $table = 'image_product';
    public $timestamps = false;

    public $fillable = [
        "image_id",
        "product_id"
    ];

}
