<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->delete();
        $path = base_path() . '/database/data-sample/tags.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('tags')->insert(array(
                'id' => $obj->id,
                'tag_name' => $obj->tag_name
            ));
        }
    }
}
