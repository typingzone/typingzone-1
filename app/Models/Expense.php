<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
<<<<<<< HEAD
    //
=======
    protected $fillable = ['user_id', 'name', 'date', 'description', 'file', 'vat', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
}
