<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endereco;
use App\Cart;
use Session;

class UserController extends Controller
{
    public function getAddress() {
        return view('user.address');
    }

    public function address(Request $request) {
        $this->validate($request, [
            'responsavel' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required'
        ]);
        $endereco = new Endereco();
        $endereco->cliente_id = Auth()->user()->id;
        $endereco->responsavel = $request->responsavel;
        $endereco->endereco = $request->endereco;
        $endereco->numero = $request->numero;
        $endereco->complemento = $request->complemento;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->save();
        return redirect($request->url);

    } 
    /* Search user address and redirects to update page to change information*/
    public function getToUpdateAddress(Request $request) {
        $user_id = $request->user;
        $address_id = $request->address;
        $endereco = Endereco::find($address_id)->where('cliente_id', $user_id)->where('id', $address_id)->get();
        $url = url()->previous();
        return view('user.getupdate')->with('endereco', $endereco)->with('url', $url);
    }

    public function updateAddress(Request $request) {
        $this->validate($request, [
            'responsavel' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'url' => 'required'
        ]);
        $id = $request->input('address');
        $endereco = new Endereco();
        $endereco = Endereco::find($id);
        $endereco->responsavel = $request->input('responsavel');
        $endereco->endereco = $request->input('endereco');
        $endereco->numero = $request->input('numero');
        $endereco->complemento = $request->input('complemento');
        $endereco->bairro = $request->input('bairro');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        $endereco->save();
        return redirect($request->input('url'));
    }
}