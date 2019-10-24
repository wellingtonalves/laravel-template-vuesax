<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $roles = [
            //USERS
            ['id' => 1, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'users', 'description' => 'Usuario - lista', 'page' => 'Usuario'],
            ['id' => 2, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'users-edit', 'description' => 'Usuario - editar ', 'page' => 'Usuario'],
            ['id' => 3, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'users-view', 'description' => 'Usuario - visualizar', 'page' => 'Usuario'],
            ['id' => 4, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'users-destroy', 'description' => 'Usuario - deletar', 'page' => 'Usuario'],
            ['id' => 5, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'users-store', 'description' => 'Usuario - incluir', 'page' => 'Usuario'],

            //DASHBOARD
            ['id' => 6, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'dashboard', 'description' => 'Pagina inicial', 'page' => 'Dashboard'],

            //PROFILES
            ['id' => 7, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'profiles', 'description' => 'Perfil - lista', 'page' => 'Perfil'],
            ['id' => 8, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'profiles-edit', 'description' => 'Perfil - editar ', 'page' => 'Perfil'],
            ['id' => 9, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'profiles-view', 'description' => 'Perfil - visualizar', 'page' => 'Perfil'],
            ['id' => 10, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'profiles-destroy', 'description' => 'Perfil - deletar', 'page' => 'Perfil'],
            ['id' => 11, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'profiles-store', 'description' => 'Perfil - incluir', 'page' => 'Perfil'],

            //PRODUCTS
            ['id' => 12, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'products', 'description' => 'Produtos - lista', 'page' => 'Produtos'],
            ['id' => 13, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'products-edit', 'description' => 'Produtos - editar ', 'page' => 'Produtos'],
            ['id' => 14, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'products-view', 'description' => 'Produtos - visualizar', 'page' => 'Produtos'],
            ['id' => 15, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'products-destroy', 'description' => 'Produtos - deletar', 'page' => 'Produtos'],
            ['id' => 16, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'products-store', 'description' => 'Produtos - incluir', 'page' => 'Produtos'],

            //CLIENTS
            ['id' => 17, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'clients', 'description' => 'Clientes - lista', 'page' => 'Clientes'],
            ['id' => 18, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'clients-edit', 'description' => 'Clientes - editar ', 'page' => 'Clientes'],
            ['id' => 19, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'clients-view', 'description' => 'Clientes - visualizar', 'page' => 'Clientes'],
            ['id' => 20, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'clients-destroy', 'description' => 'Clientes - deletar', 'page' => 'Clientes'],
            ['id' => 21, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'clients-store', 'description' => 'Clientes - incluir', 'page' => 'Clientes'],

            //REPRESENTATIVES
            ['id' => 22, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'representatives', 'description' => 'Representantes - lista', 'page' => 'Representantes'],
            ['id' => 23, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'representatives-edit', 'description' => 'Representantes - editar ', 'page' => 'Representantes'],
            ['id' => 24, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'representatives-view', 'description' => 'Representantes - visualizar', 'page' => 'Representantes'],
            ['id' => 25, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'representatives-destroy', 'description' => 'Representantes - deletar', 'page' => 'Representantes'],
            ['id' => 26, 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'name' => 'representatives-store', 'description' => 'Representantes - incluir', 'page' => 'Representantes'],
        ];

        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
