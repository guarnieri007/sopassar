<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $table = 'cartoes';

    protected $filllable = ['titular', 'numeracao', 'bandeira', 'cvc', 'endereco',
     'numero', 'bairro', 'complemento', 'cidade', 'estado', 'cliente_id'];
     
    protected $hidden = [
        'cvc', 'numeracao',
    ];
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function decrypt()
    {
        $this->numeracao = decrypt($this->numeracao);
        $this->cvc = decrypt($this->cvc);
        $this->mes = decrypt($this->mes);
        $this->ano = decrypt($this->ano);
    }

    public function encrypt() 
    {
        $this->numeracao = encrypt($this->numeracao);
        $this->cvc = encrypt($this->cvc);
        $this->mes = encrypt($this->mes);
        $this->ano = encrypt($this->ano);
    }
}
