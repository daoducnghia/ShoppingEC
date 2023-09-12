<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    //Relation with product
    public function productCart()
    {
        return $this->hasMany(Product::class, 'product_id');
    }

    //Relation with user
    public function userCart()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
