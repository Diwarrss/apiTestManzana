<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   use HasFactory;

   /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
    protected $fillable = [
      'user_id',
   ];

   /**
    * Get the user record associated with the food.
    */
   public function user()
   {
      return $this->belongsTo(User::class);
   }

   /**
    * The foods that belong to the order.
    */
   public function foods()
   {
      return $this->belongsToMany(Food::class, 'order_food')->withPivot('quantity');
   }
}
