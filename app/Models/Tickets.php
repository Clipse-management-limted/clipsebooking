<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User_tickets;

class Tickets extends Model
{
  protected $fillable = [
        'name','phone','email','ticket_id','user_id'
  ];

  public function tickets()
  {
      return $this->HasMany( User_tickets::class,'ticket_id','id');
  }
}
