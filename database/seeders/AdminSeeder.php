<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        admin::create([
          'name'=>'admin',
          'email'=>'admin@gmail.com',
          'password'=>Hash::make('admin123'),
          
          ]);
          user::create([
          'name'=>'user',
          'email'=>'user@gmail.com',
          'password'=>Hash::make('user123'),
          
          ]);
          
        
      
       
    }
}
