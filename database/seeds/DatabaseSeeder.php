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
        // Bootstrap Seeders
        $this->call(BootstrapTableSeeder::class);

        //Fake Seeders
        $this->call(FakeTableSeeder::class);
    }
}
