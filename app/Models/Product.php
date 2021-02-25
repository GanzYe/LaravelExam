<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image_path',
        'price',
        'inStock',
        'catalog_id'
    ];
    function catalog(){
        return $this->belongsTo(Catalog::class);
    }
    function deleteImage()
    {
        if (!$this->image_path)
            return;
        $path = storage_path('app/'.$this->image_path);
        if (file_exists($path))
            unlink($path);
    }
}
