<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

     public function product()
    {
    	return $this->belongsTo(Product::class,'product_id','id');
    }

     public function category()
    {
    	return $this->belongsTo(Category::class,'category_id','id');
    }

      public function unit()
    {
    	return $this->belongsTo(Unit::class,'unit_id','id');
    }

}
