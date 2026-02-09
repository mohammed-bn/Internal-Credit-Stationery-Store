<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    //
    use HasFactory;

    protected $fillable = ['name','email','password','role_id','departement_id'];
    
    public function Manager()
    {
        return $this->hasOne(Manager::class);
    }

    public function Employee()
    {
        return $this->hasOne(Employee::class);
    }
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }

    public function Admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function Departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function Role()
    {
        return $this->hasOne(Role::class);
    }
}
