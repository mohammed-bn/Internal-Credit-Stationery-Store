<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function Orders(){
        return $this->belongsTo(Order::class);
    }
}
