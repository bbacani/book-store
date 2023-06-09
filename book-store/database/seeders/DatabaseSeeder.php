<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AuthorSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            BookAuthorSeeder::class,
            BookCategorySeeder::class,
            OrderSeeder::class,
            ShipmentSeeder::class,
        ]);
    }
}
