<?php

use Illuminate\Database\Seeder;

class CartoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartao = new App\Cartao([
            'titular' => 'felipe guarnieri',
            'numeracao' => '412345312312',
            'bandeira' => 'visa',
            'cvc' => '152',
            'mes' => '01',
            'ano' => '20',
            'endereco' => 'Rua dos Casas Grandes',
            'numero' => '171',
            'bairro' => 'Jardim Do Florista',
            'complemento' => 'casa 3',
            'cidade' => 'Santo André',
            'estado' => 'São Paulo',
            'cliente_id' => 1,
        ]);
        $cartao->save();

        $cartao = new App\Cartao([
            'titular' => 'felipe guarnieri',
            'numeracao' => '412157312332',
            'bandeira' => 'master',
            'cvc' => '192',
            'mes' => '10',
            'ano' => '23',
            'endereco' => 'Rua dos Casas Grandes',
            'numero' => '171',
            'bairro' => 'Jardim Do Florista',
            'complemento' => 'casa 3',
            'cidade' => 'Santo André',
            'estado' => 'São Paulo',
            'cliente_id' => 1,
        ]);
        $cartao->save();
    }
}
