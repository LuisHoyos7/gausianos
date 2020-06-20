<?php

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
        $this->call(RolesAndPermissionsSeeder::class);
        factory(\App\Category::class, 5)->create();
        factory(\App\Course::class, 5)->create();
        factory(\App\ServiceType::class, 5)->create();
        factory(\App\WorkType::class, 5)->create();
        factory(\App\Customer::class, 5)->create();
        factory(\App\Estimate::class, 5)->create();
        factory(\App\Image::class, 5)->create();
    }
}
