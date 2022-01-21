<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert([
            'customer_name' => Str::random(10),
            'customer_phone' => '0811128281',
            'customer_email' => Str::random(10).'@gmail.com',
        ]);
    }
}
