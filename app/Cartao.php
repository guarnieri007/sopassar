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
}
