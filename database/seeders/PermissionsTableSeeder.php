<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->delete();
        $path = base_path() . '/database/data-sample/permissions.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('permissions')->insert(array(
                'id' => $obj->id,
                'permission_name' => $obj->permission_name,
            ));
        }
    }
}
