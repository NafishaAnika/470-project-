<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Donor extends Authenticatable
{
    use Notifiable;

    protected $table = 'donors';

    // Attributes that are mass assignable
    protected $fillable = [
        'name',
        'blood_group',
        'contact_number',
        'email',
        'area',
        'city',
        'last_donated_date',
        'password',
    ];

    // Attributes that should be hidden
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Attributes that should be cast to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_donated_date' => 'date',
    ];
    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'donor_id');
    }
}
