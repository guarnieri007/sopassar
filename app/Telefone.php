<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['telefone', 'tipo', 'cliente_id'];

    public function set($request) {
        $this->telefone = $request->telefone;
        $this->tipo = $request->tipo;
        $this->cliente_id = $request->cliente_id;
        $this->save();
    }
}

