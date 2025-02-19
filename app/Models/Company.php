<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_icon', 'company_logo', 'company_name', 'address', 'phone', 'email', 'invoice_templates'
    ];

    protected $casts = [
        'invoice_templates' => 'json',
    ];
}
