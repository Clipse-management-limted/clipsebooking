<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
'food_name','price','num_of_order','order_id','name','phone','email'
    ];
}
