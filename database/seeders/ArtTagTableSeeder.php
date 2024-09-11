<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('art_tag')->delete();
        $path = base_path() . '/database/data-sample/art_tag.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('art_tag')->insert(array(
                'arts_id' => $obj->arts_id,
                'tags_id' => $obj->tags_id,
            ));
        }
    }
}
