<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Receiver extends Authenticatable
{
    protected $guard = 'receiver';
    protected $table = 'receivers';
    // Fillable properties for mass assignment
    protected $fillable = [
        'name',
        'email',
        'blood_group',
        'area',
        'city',
        'need_at',
        'contact_number',
        'password',
    ];

    // Hidden properties to avoid exposure
    protected $hidden = ['password', 'remember_token'];
    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'receiver_id');
    }
}
