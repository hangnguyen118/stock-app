<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lables')->delete();
        $path = base_path() . '/database/data-sample/lables.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('lables')->insert(array(
                'id' => $obj->id,
                'lable_name' => $obj->lable_name,
            ));
        }
    }
}
