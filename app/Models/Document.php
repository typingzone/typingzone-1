<?php
<<<<<<< HEAD

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
=======
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Document extends Model
{
    use LogsActivity;
    protected $fillable=['user_id','document_name_id','file','expiry_date'];
    protected static $logAttributes=['document_name_id','file','expiry_date'];
    public function getActivitylogOptions():LogOptions
    {
        return LogOptions::defaults()->logOnly(['document_name_id','file','expiry_date'])->useLogName('document');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function documentName()
    {
        return $this->belongsTo(DocumentName::class,'document_name_id');
    }
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
}
