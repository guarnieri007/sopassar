<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['responsavel', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cliente_id'];

}