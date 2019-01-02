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
        return view('shop.checkout')->with('total', $total)->with('enderecos', $enderecos)->with('cartoes', $cartao);
    }

}