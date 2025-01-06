<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    // Specify the table if it's not following the default naming convention
    protected $table = 'complaints';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'donor_id',
        'receiver_id',
        'complaint_text',
    ];

    // Define relationships (if applicable)
    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Receiver::class, 'receiver_id');
    }
}
