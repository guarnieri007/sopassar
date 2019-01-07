@extends('layout.main')

@section('conteudo')
    <div class="row checkout">
        <div class="col-10 col-sm-10 col-md-8 col-lg-6 offset-md-2 offset-sm-1 offset-1 offset-lg-3">
            <h2>Checkout</h2>
            <h3>total: R${{ number_format($total, 2, ',', '.') }}</h3>
            {{$id}}
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
        <div class="navbar-collapse col-10 offset-1" id="cartao">
            <h2>Selecione o cartão para realizar o pagamento</h2>
                <p><a href="{{ route('card') }}">Para adicionar um novo cartão, clique aqui.</a></p>
            @foreach ($cartoes as $cartao)
                <div class="row">
                    <div class="col-6">
                        Cartão final: <span>{{ substr($cartao->numeracao, -4) }}</span>
                    </div>

                    <div class="col-6">
                        Bandeira: <span>{{$cartao->bandeira}}</span>
                    </div>

                    <div class="col-6">
                        <form action="{{ route('card') }}" method="POST">
                            <input type="hidden" value="{{ $cartao->cliente_id }}" name="user">
                            <input type="hidden" value="{{ $cartao->id }}" name="card">
                            {{ csrf_field() }}
                            <button type="submit">Editar</button>
                        </form>
                    </div>

                    <div class="col-6">
                        <form action=" {{ route('card') }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" value="{{ $cartao->id }}" name="card">
                                <button type="submit">Remover</button>
                        </form>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
</div>                
    </div>
@endsection