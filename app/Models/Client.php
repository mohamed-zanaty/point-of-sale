<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'address', 'mobile', 'email'
    ];//for column

    public function orders()
    {
        return $this->hasMany(Order::class);

    }//end of orders
}
