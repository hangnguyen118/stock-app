<?php

namespace Database\Seeders;

use DB;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('arts')->delete();
        $path = base_path() . '/database/data-sample/arts.json';
        $file = File::get($path);
        $data = json_decode($file);

        foreach ($data as $obj) {
            DB::table('arts')->insert(array(
                'id' => $obj->id,
                'galleries_id' => $obj->galleries_id,
                'customers_id' => $obj->customers_id,
                'title' => $obj->title,
                'descriptions' => $obj->descriptions,
                'price' => $obj->price,
                'display' => $obj->display,
                'watemark' => $obj->watemark,
                'dowload' => $obj->dowload,
                'view' => $obj->view,
                'like' => $obj->like,
                'favourites' => $obj->favourites,
                'comment' => $obj->comment,
                'url_cover_image' => $obj->url_cover_image,
                'url_preview_image' => $obj->url_preview_image,
            ));
        }
    }
}
