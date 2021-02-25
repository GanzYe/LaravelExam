<?php

namespace Database\Seeders;

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
        DB::table('products')->insert([[
            'name'=>'Samsung 85',
            'description'=>'best smartphone android 5.99',
            'price'=>1008,
            'inStock'=>10,
            'catalog_id'=>'1',
            'image_path'=>'public/images'
        ],[
            'name'=>'BMW',
            'description'=>'best car  5.99',
            'price'=>544,
            'inStock'=>10,
            'catalog_id'=>'2',
            'image_path'=>'public/images'
        ],[
            'name'=>'Camry 3.5',
            'description'=>'car 5.99',
            'price'=>1544,
            'inStock'=>10,
            'catalog_id'=>'2',
            'image_path'=>'public/images'
        ],[
            'name'=>'Android TV',
            'description'=>'best TV android 5.99',
            'price'=>5884,
            'inStock'=>10,
            'catalog_id'=>'3',
            'image_path'=>'public/images'
        ],[
            'name'=>'Hyper PC',
            'description'=>'best PC android 5.99',
            'price'=>1000,
            'inStock'=>10,
            'catalog_id'=>'4',
            'image_path'=>'public/images'
        ],]);
    }
}
