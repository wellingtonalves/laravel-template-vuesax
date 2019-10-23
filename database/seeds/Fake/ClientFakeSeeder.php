<?php

use Illuminate\Database\Seeder;

class ClientFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $client = [
            [
                'uuid' => \Ramsey\Uuid\Uuid::uuid4(),
                'name' => 'Alex',
                'email' => 'alexalexandrejr@gmail.com',
                'cpf' => '1313313123'
            ]
        ];

        foreach ($client as $item) {
            \App\Models\Client::create($item);
        }
    }
}
