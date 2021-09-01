<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
   use HasFactory;
   protected $table = 'foods';

   /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
   protected $fillable = [
      'name',
      'image',
      'description'
   ];

   /**
    * The orders that belong to the food.
    */
   public function orders()
   {
      return $this->belongsToMany(Order::class);
   }
}
