<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('foods')->insert([
         [
            'name' => 'Hamburguesa',
            'image' => 'https://pbs.twimg.com/profile_images/706676472648486913/k-xYZZsw_400x400.jpg',
            'description' => 'Comida Rapida',
            'created_at' => now(),
            'updated_at' => now()
         ],
         [
            'name' => 'Chorizo',
            'image' => 'https://user-assets.sharetribe.com/images/listing_images/images/4118557/big/2092471950-1599592038202.jpg?1620678093',
            'description' => 'Comida Rapida',
            'created_at' => now(),
            'updated_at' => now()
         ],
         [
            'name' => 'Pasta',
            'image' => 'https://images.rappi.com/restaurants_background/uuu-1626880299962.png?d=128x80',
            'description' => 'Comida Rapida',
            'created_at' => now(),
            'updated_at' => now()
         ]
      ]);
   }
}
