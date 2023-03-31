<?php

namespace Database\Seeders;

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

        $this->call([Users::class,Cars::class,CarTypeSeed::class,branchSeed::class,FuelPriceSeed::class] );
        // \App\Models\User::factory(10)->create();
    }
}
