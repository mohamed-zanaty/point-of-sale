<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
      'name', 'email', 'number', 'address', 'image'
    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/setting/' . $this->image);
    }//img
}
