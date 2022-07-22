<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            [
                'id' => 1,
                'cloth_id' => 1,
                'size_id' => 1,
                'price' => 1000
            ],
            [
                'id' => 2,
                'cloth_id' => 1,
                'size_id' => 2,
                'price' => 1100
            ],
            [
                'id' => 3,
                'cloth_id' => 1,
                'size_id' => 3,
                'price' => 1200
            ],
            [
                'id' => 4,
                'cloth_id' => 1,
                'size_id' => 4,
                'price' => 1300
            ],
            [
                'id' => 5,
                'cloth_id' => 1,
                'size_id' => 5,
                'price' => 1400
            ],
            [
                'id' => 6,
                'cloth_id' => 1,
                'size_id' => 6,
                'price' => 1500
            ],
            [
                'id' => 7,
                'cloth_id' => 2,
                'size_id' => 1,
                'price' => 500
            ],
            [
                'id' => 8,
                'cloth_id' => 2,
                'size_id' => 2,
                'price' => 600
            ],
            [
                'id' => 9,
                'cloth_id' => 2,
                'size_id' => 3,
                'price' => 700
            ],
            [
                'id' => 10,
                'cloth_id' => 2,
                'size_id' => 4,
                'price' => 800
            ],
            [
                'id' => 11,
                'cloth_id' => 2,
                'size_id' => 5,
                'price' => 900
            ],
            [
                'id' => 12,
                'cloth_id' => 2,
                'size_id' => 6,
                'price' => 1000
            ],
        ]);
    }
}
