<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['user_id', 'document_name_id', 'file', 'expiry_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documentName()
    {
        return $this->belongsTo(DocumentName::class, 'document_name_id'); // Use the correct foreign key
    }
    

}
