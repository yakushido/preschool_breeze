<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            [
                'id' => 1,
                'name' => '80'
            ],
            [
                'id' => 2,
                'name' => '90'
            ],
            [
                'id' => 3,
                'name' => '100'
            ],
            [
                'id' => 4,
                'name' => '110'
            ],
            [
                'id' => 5,
                'name' => '120'
            ],
            [
                'id' => 6,
                'name' => '130'
            ]
        ]);
    }
}
