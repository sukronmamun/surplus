<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;


    public $fillable = [
        'name',
        'enable',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }


}
