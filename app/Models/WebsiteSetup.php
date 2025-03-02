<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetup extends Model
{
    protected $fillable = ['cover_photo', 'welcome_message', 'about_us', 'our_services', 'faqs'];
}
