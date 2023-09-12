<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $fillable = ['name', 'price', 'description'];
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
    }

    //Relation with cart
    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
}
