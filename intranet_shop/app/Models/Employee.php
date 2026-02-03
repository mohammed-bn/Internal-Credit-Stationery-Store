<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    protected $fillable = ['tokens','total'];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
