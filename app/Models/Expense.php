<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['user_id', 'name', 'date', 'description', 'file', 'vat', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
