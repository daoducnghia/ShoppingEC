<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    //Relation between order and orderDetail
    public function orderD()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    //Relation between product and orderDetail
    public function productD()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
