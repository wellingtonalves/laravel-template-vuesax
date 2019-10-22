<?php

use Illuminate\Database\Seeder;

class ProfileRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $profile_roles = [
            //DASHBOARD
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 6, 'profile_id' => 1],

//            //ADMIN
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 1, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 2, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 3, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 4, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 5, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 6, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 7, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 8, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 9, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 10, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 11, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 12, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 13, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 14, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 15, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 16, 'profile_id' => 1],

            //USER
//            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 1, 'profile_id' => 2],
//            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 3, 'profile_id' => 2],
//            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 6, 'profile_id' => 2],
        ];

        foreach ($profile_roles as $profile_role) {
            \App\Models\ProfileRole::create($profile_role);
        }
    }
}
