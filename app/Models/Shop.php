<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public function customer()
{
    return $this->hasOne(Customer::class);
}
    public function products()
{
    return $this->hasMany(Product::class);
}
}
