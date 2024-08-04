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
        \App\Models\usuario::factory(10)->create();
        \App\Models\post::factory(10)->create();
        \App\Models\comentario::factory(10)->create();
        \App\Models\megusta::factory(10)->create();
    }
}
