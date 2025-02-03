<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'phone_number',
        'email',
        'services',
        'files',
        'description',
        'assign_to',
        'status'
    ];

    protected $casts = [
        'services' => 'array',
        'files' => 'array'
    ];
}
