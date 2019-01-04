<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Endereco;
use App\Cart;
use App\Cartao;
use Session;

class UserController extends Controller
{
    public function getAddress() {
        return view('user.add-address');
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

    public function myProfile(){
        $endereco = new Endereco();
        $endereco = Endereco::all()->where('cliente_id', Auth()->user()->id);
        $cartao = new Cartao();
        $cartao = Cartao::all()->where('cliente_id', Auth()->user()->id);
        foreach ($cartao as $card) {
            $card->decrypt();
        }
        return view('user.profile')->with('enderecos', $endereco)->with('cartoes', $cartao);
    }

    public function deleteAddress(Request $request) {
        $url = url()->previous();
        $endereco = new Endereco();
        $endereco = Endereco::find($request->address);
        $endereco->delete();
        return redirect($url);
    }

    public function putCard(Request $request) {
        $this->validate($request, [
            'titular' => 'required',
            'numeracao' => 'required',
            'cvc' => 'required',
            'mes' => 'required',
            'ano' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ]);
        $cartao = new Cartao();
        $cartao = Cartao::find($request->id);
        $cartao->titular = $request->titular;
        $cartao->numeracao = $request->numeracao;
        $cartao->cvc = $request->cvc;
        $cartao->mes = $request->mes;
        $cartao->ano = $request->ano;
        $cartao->bandeira = $request->bandeira;
        $cartao->endereco = $request->endereco;
        $cartao->numero = $request->numero;
        $cartao->complemento = $request->complemento;
        $cartao->bairro = $request->bairro;
        $cartao->cidade = $request->cidade;
        $cartao->estado = $request->estado;
        $cartao->cliente_id = Auth()->user()->id;
        $cartao->encrypt();
        $cartao->save();
        return redirect($request->url);
    }

    public function postCard(Request $request) {
        $this->validate($request, [
            'titular' => 'required',
            'numeracao' => 'required',
            'cvc' => 'required',
            'mes' => 'required',
            'ano' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ]);
        $cartao = new Cartao();
        $cartao->titular = $request->titular;
        $cartao->numeracao = $request->numeracao;
        $cartao->cvc = $request->cvc;
        $cartao->mes = $request->mes;
        $cartao->ano = $request->ano;
        $cartao->bandeira = $request->bandeira;
        $cartao->endereco = $request->endereco;
        $cartao->numero = $request->numero;
        $cartao->complemento = $request->complemento;
        $cartao->bairro = $request->bairro;
        $cartao->cidade = $request->cidade;
        $cartao->estado = $request->estado;
        $cartao->cliente_id = Auth()->user()->id;
        $cartao->encrypt();
        $cartao->save();
        return redirect($request->url);
    }

    public function deleteCard(Request $request) {
        $cartao = new Cartao();
        $cartao = Cartao::find($request->card);
        $cartao->delete();
        return redirect(url()->previous());
    }

    public function updateCard(Request $request) {
        $cartao = new Cartao();
        $cartao = Cartao::find($request->card);
        $cartao->decrypt();
        return view('user.edit-card')->with('cartao', $cartao);
    }

    public function getCard(){
        return view('user.add-card');
    }
}