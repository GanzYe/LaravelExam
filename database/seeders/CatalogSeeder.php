<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogs')->insert([[
            'name'=>'Car',
        ],[
            'name'=>'TV',
        ],[
            'name'=>'PC',
        ],]);
    }
}
