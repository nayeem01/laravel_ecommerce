<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    public function images(){
    	return $this->hasMany(ProductImage::class,'id');
    }

    public function category(){
    	return $this->belongsTo(Category::class, 'cat_id');
    }

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }

    public function imgFinder($id ){

        $img = ProductImage::where('product_id', $id)->value('image');

        return $img;
    } 
}


