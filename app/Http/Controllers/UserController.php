<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Endereco;
use App\Cart;
use App\Cartao;
use App\Telefone;
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
        $telefones = new Telefone();
        $telefones = Telefone::all()->where('cliente_id', Auth()->user()->id);
        return view('user.profile')->with('enderecos', $endereco)->with('cartoes', $cartao)->with('telefones', $telefones);
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
        $cartao->set($request);
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
        $cartao->set($request);
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

        /** Geting the user id from pagseguro **/
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions/",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "email=guarnieri007%40gmail.com&token=D8EA80FD9A424D7EB00B366DEAAAA315&undefined=",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/x-www-form-urlencoded",
            "Postman-Token: 39b0141b-2348-4a35-b2d3-cbdf5175f6e6",
            "cache-control: no-cache"
          ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
          echo "cURL Error #:" . $err;
        }else {
            $id = $response;
        }
        return view('user.add-card')->with('id', $id);
    }

    public function getTelefone() {
        return view('user.add-telefone');
    }

    public function postTelefone(Request $request) {
        $this->validate($request, [
            'telefone' => 'required',
            'tipo' => 'required',
            'url' => 'required',
        ]);
        $telefone = new Telefone();
        $telefone->set($request);
        return redirect($request->url);
    }

    public function updateTelefone(Request $request)
    {
        $telefone = new Telefone();
        $telefone = Telefone::find($request->id);
        return view('user.edit-telefone')->with('telefone', $telefone);
    }

    public function putTelefone(Request $request)
    {
        $this->validate($request, [
            'telefone' => 'required',
            'tipo' => 'required',
            'url' => 'required',
        ]);
        $telefone = new Telefone();
        $telefone = Telefone::find($request->id);
        $telefone->set($request);
        return redirect($request->url);
    }

    public function deleteTelefone(Request $request)
    {
        $telefone = new Telefone();
        $telefone = Telefone::find($request->id);
        $telefone->delete();
        return redirect(url()->previous());
    }
}