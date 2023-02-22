<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('typeAddress')->insert([
           'type' => 'Default address'
        ]);
        DB::table('typeAddress')->insert([
            'type' => 'Permanent address'
        ]);
        DB::table('typeAddress')->insert([
            'type' => 'Company address'
        ]);
        DB::table('typeAddress')->insert([
            'type' => 'Business address'
        ]);
    }
}
