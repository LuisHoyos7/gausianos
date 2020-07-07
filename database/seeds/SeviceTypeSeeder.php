<?php

use Illuminate\Database\Seeder;

class SeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\SeviceType::class, 5)->create();
    }
}
