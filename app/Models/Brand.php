<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $fillable = ['image','category_id'];//for column

    public $translatedAttributes = ['name'];//for lang

    protected $appends = ['image_path',];

    public function getImagePathAttribute()
    {
        return asset('uploads/brand/'. $this->image);
    }//img


    public function category(){
        return $this->belongsTo(Category::class);
    }//category rel


    public function products(){
        return $this->hasMany(Product::class);
    }//product rel

}
