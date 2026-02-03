<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    //

    public function Users(){
        return $this->hasMany(User::class);
    }

}
