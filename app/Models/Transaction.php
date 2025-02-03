<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'service_id',
        'govt_cost',
        'service_cost',
        'status',
        'paid_by',
        'pay_status'
    ];
}
