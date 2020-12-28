<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['image',];//for column

    public $translatedAttributes = ['name'];//for lang

    protected $appends = ['image_path',];

    public function getImagePathAttribute()
    {
        return asset('uploads/category/'. $this->image);
    }//img

    public function brands(){
        return $this->hasMany(Brand::class);
    }//brands rel


    public function products(){
        return $this->hasMany(Product::class);
    }//product rel

    public function blogs(){
        return $this->hasMany(Blog::class);
    }//blogs rel

}
