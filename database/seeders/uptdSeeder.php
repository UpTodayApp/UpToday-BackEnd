<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class uptdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\post::factory(10)->create();

    }
}
