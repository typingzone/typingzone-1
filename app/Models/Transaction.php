<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Transaction extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['order_id', 'service_id', 'application_no', 'govt_cost', 'service_cost', 'total_cost'];

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

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['order_id', 'service_id', 'application_no', 'govt_cost', 'service_cost', 'total_cost'])
            ->useLogName('transaction');
    }
}
