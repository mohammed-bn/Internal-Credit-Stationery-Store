<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name','email','password'];
    
    public function Manager()
    {
        return $this->hasMany(Manager::class);
    }

    public function Employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function Admin()
    {
        return $this->hasMany(Admin::class);
    }
}
