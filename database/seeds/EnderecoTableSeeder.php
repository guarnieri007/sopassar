<?php

use Illuminate\Database\Seeder;

class EnderecoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $endereco = new App\Endereco([
            'responsavel' => 'Elenice Mendes Pereira',
            'endereco' => 'Rua Arara Azul',
            'numero' => 900,
            'complemento' => null,
            'bairro' => 'Clube de campo',
            'cidade' => 'Santo André',
            'estado' => 'São Paulo',
            'cliente_id' => '1'
        ]);
        $endereco->save();

        $endereco = new App\Endereco([
            'responsavel' => 'Elenice, Marcelo ou Felipe',
            'endereco' => 'Rua Helena Aparecida Secol',
            'numero' => 850,
            'complemento' => null,
            'bairro' => 'Jardim Palermo',
            'cidade' => 'São Bernardo do Campo',
            'estado' => 'São Paulo',
            'cliente_id' => '1'
        ]);
        $endereco->save();
    }
}
