<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galleries')->delete();
        $path = base_path() . '/database/data-sample/galleries.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('galleries')->insert(array(
                'id' => $obj->id,
                'gallery_name' => $obj->gallery_name,
                'customers_id' => $obj->customers_id
            ));
        }
    }
}
