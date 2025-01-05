<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Chat extends Model
{
   protected $fillable = [
       'donor_id',
       'receiver_id',
       'message'
   ];


   public function donor()
   {
       return $this->belongsTo(Donor::class);
   }


   public function receiver()
   {
       return $this->belongsTo(Receiver::class);
   }
}
