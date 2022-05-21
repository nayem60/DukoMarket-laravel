<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\coupon;
class CouponSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        coupon::create([
          'code'=>'Dukamark',
          'type'=>'fixed',
          'value'=>200,
          'cart_value'=>200,
          'exfail_date'=>'2022-7-20'
          ]);
    }
}
