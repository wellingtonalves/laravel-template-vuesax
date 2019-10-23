<?php

use Illuminate\Database\Seeder;

class UserDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com.br',
            'username' => 'admin',
            'email_verified_at' => now(),
            'password' => '123456',
            'remember_token' => null,
            'is_admin' => 1,
            'profile_id' => 1,
            'status' => 'ativo',
        ]);
    }
}
