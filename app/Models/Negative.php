<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negative extends Model
{
    protected $fillable = ['name', 'description', 'product_id'];
    public function product()
    {
        return $this->belongsTo(Product::class);
         
    }
}
