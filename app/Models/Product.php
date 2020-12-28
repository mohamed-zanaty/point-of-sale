<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;

    protected $fillable = ['image', 'category_id', 'brand_id', 'featured',
        'purchase_price', 'sale_price', 'stock',
    ];//for column

    public $translatedAttributes = ['name', 'description'];//for lang

    protected $appends = ['image_path', 'profit_percent', 'profit_price', 'status'];

    public function getImagePathAttribute()
    {
        return asset('uploads/product/' . $this->image);
    }//img

    public function getStatusAttribute()
    {
        if ($this->featured == 1){
            return 'مميز';
        } else{
            return 'غير مميز';
        }

    }//status


    public function category()
    {
        return $this->belongsTo(Category::class);
    }//category rel


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }//brand rel


    public function getProfitPriceAttribute()
    {
        $profit_price = $this->sale_price - $this->purchase_price;
        return number_format($profit_price, 2);

    }//end of get profit price


    public function getProfitPercentAttribute()
    {
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = $profit * 100 / $this->purchase_price;
        return number_format($profit_percent, 2);

    }//end of get profit percent


    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');

    }//end of orders
}
