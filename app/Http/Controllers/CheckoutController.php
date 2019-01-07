<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endereco;
use App\Cart;
use Session;
use App\Produto;
use App\Cartao;

class CheckoutController extends Controller
{
    public function getEndereco($userId) {
        return $endereco = Endereco::find()->where('cliente_id', $userId);
    }

    public function getEnderecos($userId) {
        return $enderecos = Endereco::all()->where('id', $userId);
    }

    public function cartAdd(Request $request, $id) {
        $produto = Produto::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($produto, $produto->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('home', '#pacotes');
    }

    public function cartGet() {
        if(!Session::has('cart')) {
            return view('shop.shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shoppingcart', ['produtos' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout() {
        if(!Session::has('cart')) {
            return view('shop.shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $enderecos = Endereco::all()->where('cliente_id', auth()->user()->id);
        $cartao = new Cartao();
        $cartao = Cartao::all()->where('cliente_id', Auth()->user()->id);
        foreach ($cartao as $card) {
            $card->decrypt();
        }


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
        }


        return view('shop.checkout')->with('total', $total)->with('enderecos', $enderecos)->with('cartoes', $cartao)->with('id', $response);
    }

}