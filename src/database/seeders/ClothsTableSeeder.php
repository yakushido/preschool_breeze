<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClothsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cloths')->insert([
            [
                'id' => 1,
                'name' => 'ポロシャツ',
                'img_path' => 'img/cloth.jpg'
            ],
            [
                'id' => 2,
                'name' => 'パンツ',
                'img_path' => 'img/pants.jpg'
            ],
        ]);
    }
}
