<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;
use Illuminate\Support\Str;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker =\Faker\Factory::create();
      $name=$faker->unique()->words($nb=2,$asText=true);
      $slug=Str::slug($name,'-');
        product::create([
          'category_id'=>rand(1,5),
          'subcategory_id'=>rand(1,10),
          'subcategory_child_id'=>rand(1,11),
          'brand_id'=>rand(1,5),
          'name'=>$name,
          'slug'=>$slug,
          'price'=>$faker->numberBetween(500,10000),
          'discount_price'=>$faker->numberBetween(300,5000),
          'quantity'=>rand(20,300),
          'sku'=>Str::random(15),
          'image'=>'tp-'.$faker->unique()->numberBetween(1,20).'.jpg'
          ]);
    }
}
