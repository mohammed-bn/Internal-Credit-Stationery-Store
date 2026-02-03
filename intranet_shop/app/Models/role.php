<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['title'];

    public function User(){
        return $this->hasMany(User::class);
    }
}
