<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'user_id', 'product_id'];

    public function Manager()
    {
        return $this->belongsTo(Manager::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}