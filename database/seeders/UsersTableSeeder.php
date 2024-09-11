<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        $path = base_path().'/database/data-sample/users.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('users')->insert(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'email' => $obj->email,
                'password' => $obj->password,
                'role' => $obj->role
            ));
    }
    }
}
