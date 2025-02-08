<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'service_id',
        'application_no',
        'govt_cost',
        'service_cost',
        'total_cost',
        'vat_amount',
        'status',
        'paid_by',
        'pay_status',
        'description',
        'receipt',
    ];

    // Transaction belongs to an Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Transaction belongs to a User (user who processed the transaction)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Transaction belongs to a Service (add this relationship)
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
