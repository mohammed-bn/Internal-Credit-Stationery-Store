<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function Manager(){
        return $this->belongsTo(Manager::class);
    }
    public function Employee(){
        return $this->belongsTo(Employee::class);
    }
    public function Product(){
        return $this->hasOne(Product::class);
    }
}
