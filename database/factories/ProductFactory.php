<?php

namespace Database\Factories;
use App\Models\product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      $name=$this->faker->unique()->words($nb=2,$asText=true);
      $slug=Str::slug($name,'-');
        return [
            'category_id'=>$this->faker->numberBetween(1,10),
            'subcategory_id'=>$this->faker->numberBetween(1,10),
            'subcategory_child_id'=>$this->faker->numberBetween(1,5),
            'brand_id'=>$this->faker->numberBetween(1,5),
            'name'=>$name,
            'slug'=>$slug,
            'price'=>$this->faker->numberBetween(500,10000),
            'discount_price'=>$this->faker->numberBetween(300,7000),
            'long_description'=>$this->faker->text(300),
            'short_description'=>$this->faker->text(150),
            'quantity'=>$this->faker->numberBetween(10,50),
            'stock'=>'In Stock',
            'sku'=>"DD-".$this->faker->unique()->numberBetween(1,2000),
            'image'=>'tp-'.$this->faker->unique()->numberBetween(1,20).'.jpg',
            
        ];
    }
}
