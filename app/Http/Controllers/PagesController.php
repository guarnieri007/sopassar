<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Cart;
use Session;

class PagesController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('pages.home')->with('produtos', $produtos);
    }
}