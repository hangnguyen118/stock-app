<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_permission')->delete();
        $path = base_path() . '/database/data-sample/user_permission.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('user_permission')->insert(array(
                'users_id' => $obj->users_id,
                'permissions_id' => $obj->permissions_id
            ));
        }
    }
}
