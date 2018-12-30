@extends('layout.main')

@section('conteudo')
    <div>
        @if (Session::has('cart'))
        <div class="row checkout">
            <div class="col-10 col-sm-10 offset-sm-1 offset-1">
                <ul class="list-group">
                    <div class="list-group-item carrinho_listar">
                        <div class="col-sm-1">
                            <span>Qtd</span>
                        </div>
                        <div class="col-sm-7">
                            <span>Produto</span>
                        </div>
                        <div class="col-sm-2">
                            <span>Valor</span>
                        </div>
                        <div class="col-sm-2">
                                <span>Ações</span>
                        </div>
                    </div>
                        @foreach ($produtos as $produto)
                        <div class="list-group-item carrinho_listar">
                            <div class="col-1">
                                <span class="badge badge-secondary">{{$produto['qt']}}</span>
                            </div>
                            <div class="col-7">
                               <strong>{{$produto['item']['plano']}} - {{($produto['item']['quantidade']) > 1 ? $produto['item']['quantidade'] . " peças" : "unidade" }} </strong>
                            </div>
                            <div class="col-2">
                                <span class="badge badge-success">R$ {{number_format($produto['price'], 2, ',', '.') }}</span>
                            </div>
                            <div class="col-2">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Ações<span class="carret"></span> </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Adicionar 1</a></li>
                                        <li><a href="#">Remover 1</a></li>
                                    </ul>
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
                    <div class="col-6 offset-3">
                        <h2>Nenhum item no seu carrinho</h2>
                    </div>                
                </div>
        @endif
    </div>
@endsection