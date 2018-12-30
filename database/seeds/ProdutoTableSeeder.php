<?php

use Illuminate\Database\Seeder;

class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produto = new App\Produto([
            'imagePath' => "../img/individual.svg",
            'plano' => "Individual",
            'quantidade' => 15,
            'preco' => 36.00
        ]);
        $produto->save();

        $produto = new App\Produto([
            'imagePath' => "../img/economico.svg",
            'plano' => "Econômico",
            'quantidade' => 20,
            'preco' => 47.00
        ]);
        $produto->save();

        $produto = new App\Produto([
            'imagePath' => "../img/casal.svg",
            'plano' => "Casal",
            'quantidade' => 30,
            'preco' => 69.00
        ]);
        $produto->save();

        $produto = new App\Produto([
            'imagePath' => "../img/familia.svg",
            'plano' => "Familiar",
            'quantidade' => 40,
            'preco' => 90.00
        ]);
        $produto->save();

        $produto = new App\Produto([
            'imagePath' => "../img/camiseta.svg",
            'plano' => "Camisas/Lençóis",
            'quantidade' => 1,
            'preco' => 7.00
        ]);
        $produto->save();

        $produto = new App\Produto([
            'imagePath' => "../img/calca.svg",
            'plano' => "Demais Peças",
            'quantidade' => 1,
            'preco' => 5.00
        ]);
        $produto->save();
        
    }
}

