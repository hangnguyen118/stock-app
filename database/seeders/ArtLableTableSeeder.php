<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtLableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('art_lable')->delete();
        $path = base_path() . '/database/data-sample/art_lable.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('art_lable')->insert(array(
                'arts_id' => $obj->arts_id,
                'lables_id' => $obj->lables_id,
            ));
        }
    }
}
