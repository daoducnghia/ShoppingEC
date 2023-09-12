<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class Order extends Model
{
    use HasFactory;

    //Relation between user and order
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //Relation beween order and orderDetail
    public function orderDetailOrder(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
