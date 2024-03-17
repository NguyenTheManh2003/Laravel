<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limit = 50;
        for($i=0; $i<$limit; $i++)
        {
            DB::table('customers')->insert([
                'name'=>fake()->name(),
                'address'=>fake()->address(),
                'email'=>fake()->unique()->safeEmail(),
                'phone'=>fake()->phoneNumber(),
                'province'=>fake()->countryCode()
            ]);
        }
    }
}