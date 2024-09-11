<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->delete();
        $path = base_path() . '/database/data-sample/images.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('images')->insert(array(
                'id' => $obj->id,
                'image_url' => $obj->image_url,
            ));
        }
    }
}
