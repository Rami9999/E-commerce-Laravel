<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name'=>'LG mobile',
            'price'=>'300',
            'description'=> 'A smartphone with 4GB RAM',
            'category'=>'mobile',
            'gallery'=>'https://www.amazon.in/LG-Q6-Smartphone-18-FullVision/dp/B0784PK4J7'

        ]);
    }
}
