<?php

use Illuminate\Database\Seeder;

class RepresentativeFakeSeeder extends Seeder
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
                'name' => 'Alex Representante',
                'email' => 'alexalexandrejr@gmail.com',
                'cnpj' => '1313313123',
                'phone' => '1234567891'
            ]
        ];

        foreach ($client as $item) {
            \App\Models\Representative::create($item);
        }
    }
}
