<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
   use HasFactory;

   /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
    protected $fillable = [
      'quantity',
      'order_id',
      'food_id',
   ];
}
