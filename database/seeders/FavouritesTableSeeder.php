<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavouritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('favourites')->delete();
        $path = base_path() . '/database/data-sample/favourites.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('favourites')->insert(array(
                'customers_id' => $obj->customers_id,
                'arts_id' => $obj->arts_id,
            ));
        }
    }
}
