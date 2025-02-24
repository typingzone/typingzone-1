<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Spatie\Permission\Traits\HasRoles; // Import the HasRoles trait

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // Add HasRoles to the list of traits

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
=======
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
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
}
