<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => 'Politics',
            'slug' => 'politics',
            'status' => 'Active',
        ]);

        DB::table('categories')->insert([
            'name' => 'Business',
            'slug' => 'business',
            'status' => 'Active',
        ]);

        DB::table('categories')->insert([
            'name' => 'Sports',
            'slug' => 'sports',
            'status' => 'Active',
        ]);

        DB::table('categories')->insert([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
            'status' => 'Active',
        ]);
    }
}
