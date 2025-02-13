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

    // Order belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Order belongs to an assigned User
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }

    // Order has many Transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
