<?php

namespace App\Models;
use App\Models\Event_Tickets;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
  protected $fillable = [
    'id','title','description','start_time','venue','file_name'
  ];

  protected $casts= [
      'tickets_types' => 'array'
  ];

  public function tickets()
  {
      return $this->HasMany( Event_Tickets::class,'id','event_id');
  }
}
