<?php
namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;


class BloodBank extends Authenticatable
{
   protected $table = 'bloodbank';
   // If the primary key is not 'id', you should define it explicitly
   protected $primaryKey = 'TYPE_ID';  // Specify the correct primary key column name
   protected $fillable = [
       'Blood_Type',
       'Availability',
       'Location',
       'Contact_No',
       'Expiry_Date',
       'Email',
       'Password'
   ];
   protected $hidden = ['password', 'remember_token'];
}


