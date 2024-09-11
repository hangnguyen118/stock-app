<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('art_image')->delete();
        $path = base_path() . '/database/data-sample/art_image.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('art_image')->insert(array(
                'arts_id' => $obj->arts_id,
                'images_id' => $obj->images_id,
            ));
        }
    }
}
