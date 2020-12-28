<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
class Admin extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'image','password',
    ];//for column
    protected $appends = [
        'image_path',
    ];// for image

    public function getImagePathAttribute()
    {
        return asset('uploads/user/'. $this->image);
    }


    public function blogs(){
        return $this->hasMany(Blog::class);
    }//blogs rel
}
