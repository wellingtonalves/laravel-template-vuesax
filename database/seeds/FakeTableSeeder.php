<?php

use Illuminate\Database\Seeder;

class FakeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserFakeSeeder::class);
        $this->call(ClientFakeSeeder::class);
        $this->call(RepresentativeFakeSeeder::class);
    }
}
