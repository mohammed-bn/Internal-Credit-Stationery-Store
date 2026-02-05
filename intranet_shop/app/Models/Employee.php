<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    use HasFactory;

    protected $fillable = ['tokens', 'total'];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
}
