@extends('layout.main')

@section('conteudo')
    <div class="row checkout">
        <div class="col-10 col-sm-10 col-md-8 col-lg-6 offset-md-2 offset-sm-1 offset-1 offset-lg-3">
            <h2>Checkout</h2>
            <h3>total: R${{ number_format($total, 2, ',', '.') }}</h3>


            @if (count($enderecos) > 0)
            <div class="row">
                <div class="col-12">
                    <hr>
                    <h2>Selecione qual endereço será realizada a retirada e entrega das roupas:</h2>
                </div>
                <div class="row endereco cartao">
                    @foreach ($enderecos as $endereco)
                        <div class="col-6 col-sm-4 row">
                            <div class="col-12">
                            <h3>
                                Responsável: <span>{{$endereco->responsavel}}</span>
                            </h3>
                            </div>
                            <div class="col-12">
                                <h3>
                                    <span>{{$endereco->endereco}}</span>
                                </h3>
                            </div>
                            <div class="col-6">
                                <h3>
                                    <span>{{$endereco->numero}}</span>
                                </h3>
                            </div>
                            <div class="col-6">
                                <h3>
                                    <span>{{$endereco->complemento}}</span>
                                </h3>
                            </div>
                            <div class="col-12">
                                <h3>
                                    <span>{{$endereco->bairro}}</span>
                                </h3>
                            </div>
                            <div class="col-12">
                                <h3>
                                    <span>{{$endereco->cidade}}</span>
                                </h3>
                            </div>
                            <div class="col-12">
                                <h3>
                                    <span>{{$endereco->estado}}</span>
                                </h3>
                            </div>
                            <div class="col-2">
                                <form action="{{route('edit-address')}}" method="POST">
                                    <input type="hidden" name="user" value="{{Auth()->user()->id}}">
                                    <input type="hidden" name="address" value="{{$endereco->id}}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn">Editar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
            <h2>Você não tem endereço cadastrado, <a href="{{route('getAddress')}}">clique aqui</a> e cadastre um para prosseguir.</h2>

            @endif

            <hr>
            @if (count($cartoes) > 0)
            @foreach ($cartoes as $cartao)
            {{$cartao->bandeira}}
        @endforeach
            @else
                sem cartão
            @endif
            
            <h2>Forma de pagamento</h2>
            <p>Cartão de crédito</p>
            <form action="{{route('checkout')}}" method="POST">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        <div class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" id="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-xs-2">
                            <div class="form-group">
                                <label for="number">Número</label>
                                <input type="number" id="number" class="form-control" required>
                            </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group">
                            <label for="complement">Complemento</label>
                            <input type="text" id="complement" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>                
    </div>
@endsection