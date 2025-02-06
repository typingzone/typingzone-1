<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = ['name', 'profile_photo', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    // User has many LoginActivity records
    public function loginActivities()
    {
        return $this->hasMany(LoginActivity::class);
    }

    // User has many Notes
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    // User has many Expenses
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    // User has many Services
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    // User has many Transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
