<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tickets;

class User_tickets extends Model
{
  protected $fillable = [
        'event_id','id','ticket_name','quantity','amount','payment_status','user_id'
  ];

  public function author()
  {
      return $this->belongsTo( Tickets::class,'id','ticket_id');
  }
}
