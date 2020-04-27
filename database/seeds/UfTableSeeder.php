<?php

use Illuminate\Database\Seeder;

class UfTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $uf = [
            ['sg_uf' => 'AC', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Acre'],
            ['sg_uf' => 'AL', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Alagoas'],
            ['sg_uf' => 'AP', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Amapá'],
            ['sg_uf' => 'AM', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Amazonas'],
            ['sg_uf' => 'BA', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Bahia'],
            ['sg_uf' => 'CE', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Ceará'],
            ['sg_uf' => 'DF', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Distrito Federal'],
            ['sg_uf' => 'ES', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Espírito Santo'],
            ['sg_uf' => 'GO', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Goiás'],
            ['sg_uf' => 'MA', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Maranhão'],
            ['sg_uf' => 'MT', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Mato Grosso'],
            ['sg_uf' => 'MS', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Mato Grosso do Sul'],
            ['sg_uf' => 'MG', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Minas Gerais'],
            ['sg_uf' => 'PA', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Pará'],
            ['sg_uf' => 'PB', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Paraíba'],
            ['sg_uf' => 'PR', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Paraná'],
            ['sg_uf' => 'PE', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Pernambuco'],
            ['sg_uf' => 'PI', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Piauí'],
            ['sg_uf' => 'RJ', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Rio de Janeiro'],
            ['sg_uf' => 'RN', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Rio Grande do Norte'],
            ['sg_uf' => 'RS', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Rio Grande do Sul'],
            ['sg_uf' => 'RO', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Rondônia'],
            ['sg_uf' => 'RR', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Roraima'],
            ['sg_uf' => 'SC', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Santa Catarina'],
            ['sg_uf' => 'SP', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'São Paulo'],
            ['sg_uf' => 'SE', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Sergipe'],
            ['sg_uf' => 'TO', 'uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'tx_nome_uf' => 'Tocantins'],
        ];

        foreach ($uf as $item) {
            \App\Models\Uf::create($item);
        }
    }
}
