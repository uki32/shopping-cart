<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

        $faker = Faker::create();

        for ($i = 1; $i <= 12; $i++){
            DB::table('products')->insert([
                'ImagePath' => 'https://m.media-amazon.com/images/I/81m1s4wIPML._AC_UF894,1000_QL80_.jpg',
                'title' => $faker->text(10),
                'description' => $faker->text(50),
                'price' => random_int(12,20),
            ]);
        }
   
}
}