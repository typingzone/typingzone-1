<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
<<<<<<< HEAD
    //
=======
    protected $fillable = [
        'company_icon', 'company_logo', 'company_name', 'address', 'phone', 'email', 'invoice_templates'
    ];

    protected $casts = [
        'invoice_templates' => 'json',
    ];
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
}
