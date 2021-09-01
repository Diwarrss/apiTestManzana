<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderFoodTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('order_food', function (Blueprint $table) {
         $table->id();
         $table->integer('quantity');
         $table->foreignId('order_id')->constrained('orders');
         $table->foreignId('food_id')->constrained('foods');
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('order_food');
   }
}
