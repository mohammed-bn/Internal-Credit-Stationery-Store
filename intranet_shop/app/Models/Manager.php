<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    //    
    protected $fillable = ['tokens','total'];
    public function User(){
        return $this->belongsTo(User::class);
    }
    
}
