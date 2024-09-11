<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->delete();
        $path = base_path() . '/database/data-sample/customers.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('customers')->insert(array(
                'users_id' => $obj->users_id,
                'country' => $obj->country,
                'birthday' => $obj->birthday,
                'biography' => $obj->biography,
                'credit_balance' => $obj->credit_balance
            ));
        }
    }
}
