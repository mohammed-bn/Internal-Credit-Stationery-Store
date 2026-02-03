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
        return $this->hasOne(Manager::class);
    }

    public function Employee()
    {
        return $this->hasOne(Employee::class);
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
