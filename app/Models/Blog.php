<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Translatable;

    protected $fillable = [
        'admin_id', 'featured', 'image', 'status', 'category_id', 'seo_title', 'seo_description', 'seo_keyword'
    ];//for column

    public $translatedAttributes = ['title', 'description'];//for lang

    protected $appends = ['image_path', 'adv', 'st'];

    public function getImagePathAttribute()
    {
        return asset('uploads/blog/' . $this->image);
    }//img

    public function getAdvAttribute()
    {
        if ($this->featured == 1) {
            return 'مميز';
        } else {
            return 'غير مميز';
        }

    }//featured

    public function getStAttribute()
    {
        if ($this->status == 1) {
            return 'تم النشر';
        }
        if ($this->status == 0) {
            return 'لم يتم النشر';
        }
    }//status


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }//admin rel


    public function category()
    {
        return $this->belongsTo(Category::class);
    }//category rel
}
