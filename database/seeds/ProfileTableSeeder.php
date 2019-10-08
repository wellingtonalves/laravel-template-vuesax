<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = [
            ['id' => 1, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'admin'],
            ['id' => 2, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'user'],
        ];

        foreach ($profile as $item) {
            \App\Models\Profile::create($item);
        }
    }
}
