<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('regions')->insert([
            'name' => 'Southeastern',
            'slug' => 'southeastern',
            'status' => 'Active',
        ]);

        DB::table('regions')->insert([
            'name' => 'National',
            'slug' => 'national',
            'status' => 'Active',
        ]);

        DB::table('regions')->insert([
            'name' => 'International',
            'slug' => 'international',
            'status' => 'Active',
        ]);
    }
}
