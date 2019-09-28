<?php

namespace App\Models;
use App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class events_tickets extends Model
{
  protected $fillable = [
      'event_id', 'ticket_name','price','ticket_available','available_from','available_to'
  ];

  public function event()
  {
      return $this->belongsTo( Events::class,'event_id','id');
  }
}
