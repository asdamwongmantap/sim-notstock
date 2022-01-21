<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Anya Shoe Rack',
            'product_category' => 'Shoe Rack',
            'product_sku' => 'ASR001',
            'min_qty' => 2,
        ]);
    }
}
