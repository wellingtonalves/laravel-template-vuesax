<?php

use Illuminate\Database\Seeder;

class BootstrapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OauthClientsTableSeeder::class); // Auth
        $this->call(RoleTableSeeder::class); // Roles
        $this->call(ProfileTableSeeder::class); // Profiles
        $this->call(ProfileRoleTableSeeder::class); // Profiles

        $this->call(UserDefaultSeeder::class); // User Admin
    }
}
