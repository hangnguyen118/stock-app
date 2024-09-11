<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->delete();
        $path = base_path() . '/database/data-sample/comments.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('comments')->insert(array(
                'id' => $obj->id,
                'customers_id' => $obj->customers_id,
                'arts_id' => $obj->arts_id,
                'content' => $obj->content,
                'like' => $obj->like,
                'type' => $obj->type,
            ));
        }
    }
}
