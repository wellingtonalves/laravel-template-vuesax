<?php

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'user_id' => null,
            'name' => 'Laravel Personal Access Client',
            'secret' => 'up5ubv1iEECOsHSDGN6Cu11z0wP3Q6NavbCzuq1X',
            'redirect' => '/',
            'personal_access_client' => true,
            'password_client' => false,
            'revoked' => false,
            'created_at' => \Illuminate\Support\Carbon::now(),
            'updated_at' => \Illuminate\Support\Carbon::now()
        ]);

        DB::table('oauth_clients')->insert([
            'user_id' => null,
            'name' => 'Laravel Password Grant Client',
            'secret' => 'IYo9VB3qFVQjB53cJWV1M6zoOxQv5dZDo231cDmR',
            'redirect' => '/',
            'personal_access_client' => false,
            'password_client' => true,
            'revoked' => false,
            'created_at' => \Illuminate\Support\Carbon::now(),
            'updated_at' => \Illuminate\Support\Carbon::now()
        ]);
    }
}
