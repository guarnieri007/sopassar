@extends('layout.main')

@section('conteudo')
    <div>
        @if (Session::has('cart'))
        <div class="row checkout">
            <div class="col-10 offset-1">
                <h2>Meu Carrinho</h2>
            </div>
            <div class="col-10 col-sm-10 offset-sm-1 offset-1">
                <ul class="list-group">
                    <div class="list-group-item">
                        <div class="row carrinho_header">
                            <div class="col-2">
                                <span>Qtd</span>
                            </div>
                            <div class="col-5">
                                <span>Produto</span>
                            </div>
                            <div class="col-2">
                                <span>Valor</span>
                            </div>
                            <div class="col-3">
                                    <span>Ações</span>
                            </div>
                        </div>
                    </div>
                        @foreach ($produtos as $produto)
                        <div class="list-group-item">
                            <div class="row carrinho_itens">
                                <div class="col-2">
                                    <span class="badge badge-secondary">{{$produto['qt']}}</span>
                                </div>
                                <div class="col-5">
                                <strong>{{$produto['item']['plano']}} - {{($produto['item']['quantidade']) > 1 ? $produto['item']['quantidade'] . " peças" : "1 unidade" }} </strong>
                                </div>
                                <div class="col-2">
                                    <span>{{number_format($produto['price'], 2, ',', '.') }}</span>
                                </div>
                                <div class="col-3">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Mais<span class="carret"></span> </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Adicionar 1</a></li>
                                            <li><a href="#">Remover 1</a></li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
                <hr>
            </div>
            <div class="col-10 offset-1">
                    <strong>Total: R$ {{number_format($totalPrice, 2, ',', '.')}}</strong>
            </div>
            <div class="col-10 offset-1">
                    <a href="{{route('checkout')}}" type="button" class="btn btn-success">Finalizar Pedido</a>
            </div>
        </div>
        @else
            <div class="row checkout">
                    <div class="col-10 offset-1">
                        <h2>Nenhum item no seu carrinho</h2>
                    </div>                
                </div>
        @endif
    </div>
@endsection