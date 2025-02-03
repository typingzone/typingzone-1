<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'service_name',
        'govt_cost',
        'service_cost'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
