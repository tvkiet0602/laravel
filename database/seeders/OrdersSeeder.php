<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [];
        $faker = Factory::create('vi_VN');
        for ($i=1; $i <= 30; $i++) {
            array_push($list, [
                'customer_id' => $faker->numberBetween(1, 10),
                'product_id' => $faker->numberBetween(1, 7),
                'address_id' => $faker->numberBetween(1, 5)
            ]);
        }
        DB::table('orders')->insert($list);
    }
}
