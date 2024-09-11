<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(LablesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UserPermissionsTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(ArtsTableSeeder::class);
        $this->call(FavouritesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(ArtLableTableSeeder::class);
        $this->call(ArtTagTableSeeder::class);
        $this->call(ArtImageTableSeeder::class);
    }
}
