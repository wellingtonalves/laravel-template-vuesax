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
        $representative = [
            [
                'uuid' => \Ramsey\Uuid\Uuid::uuid4(),
                'name' => 'Alex Representante',
                'email' => 'alexalexandrejr@gmail.com',
                'cnpj' => '1313313123',
                'phone' => '1234567891'
            ]
        ];

        $representativeUser = [
            [
                'name' => 'Alex Representante',
                'email' => 'alex@representative.com.br',
                'username' => 'alex-representante',
                'email_verified_at' => now(),
                'password' => '123456',
                'remember_token' => null,
                'is_admin' => 0,
                'profile_id' => 2,
                'representative_id' => 1,
                'status' => 'ativo',
            ]
        ];

        foreach ($representative as $item) {
            \App\Models\Representative::create($item);
        }

        foreach ($representativeUser as $item) {
            \App\Models\User::create($item);
        }
    }
}
