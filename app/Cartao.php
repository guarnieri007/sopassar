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
        $this->cpf = decrypt($this->cpf);
        $this->nascimento = decrypt($this->nascimento);
    }

    public function encrypt() 
    {
        $this->numeracao = encrypt($this->numeracao);
        $this->cvc = encrypt($this->cvc);
        $this->mes = encrypt($this->mes);
        $this->ano = encrypt($this->ano);
        $this->cpf = encrypt($this->cpf);
        $this->nascimento = encrypt($this->nascimento);
    }

    public function set($request) {
        $this->titular = $request->titular;
        $this->cpf = $request->cpf;
        $this->nascimento = $request->nascimento;
        $this->numeracao = $request->numeracao;
        $this->cvc = $request->cvc;
        $this->mes = $request->mes;
        $this->ano = $request->ano;
        $this->bandeira = $request->bandeira;
        $this->endereco = $request->endereco;
        $this->numero = $request->numero;
        $this->complemento = $request->complemento;
        $this->bairro = $request->bairro;
        $this->cidade = $request->cidade;
        $this->estado = $request->estado;
        $this->cliente_id = Auth()->user()->id;
        $this->encrypt();
    }
}
