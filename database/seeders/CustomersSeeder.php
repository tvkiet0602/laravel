<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1; $i<=9; $i++){
            DB::table('customers')->insert([
                'name' => 'Van Kiet' . $i,
                'gender' => 1,
                'username' => 'tvkiet' .$i,
                'password' => Hash::make('tvkiet' .$i),
                'address' => 'Can Tho city',
                'email' => 'tvkiet'.$i.'@ninepoints.vn'
            ]);
        }
       DB::table('customers')->insert([
            'name' => 'Admin',
            'gender' => 1,
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'address' => 'Can Tho city',
            'email' => 'admin@ninepoints.vn'
        ]);
    }
}
