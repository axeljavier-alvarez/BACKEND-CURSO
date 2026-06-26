<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image_path', 'qr_code_path'];
    protected $appends = [
        'product_image'
    ];
    public function positives()
    {
        return $this->hasMany(Positive::class);
         
    }

    public function negatives()
    {
        return $this->hasMany(Negative::class);   
    }

    public function getProductImageAttribute()
    {
        return asset($this->image_path);
    }

}
