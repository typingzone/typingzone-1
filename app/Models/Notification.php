<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['order_id', 'assign_to', 'comment'];

    // Notification belongs to an Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
