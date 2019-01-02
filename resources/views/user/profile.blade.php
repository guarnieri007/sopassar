@extends('layout.main')

@section('conteudo')
    <div>
        <div class="row basico">
            <div class="col-10 offset-1">
                <h1>Meu Perfil</h1>
                <p>Clique nos itens abaixo que deseja verificar</p>
            </div>
            <div class="col-10 offset-1" data-toggle="collapse" data-target="#endereco" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <h2>Endereços</h2>
            </div>
            <div class="collapse navbar-collapse col-10 offset-1" id="endereco">
                <p><a href="{{ route('getAddress') }}">Para adicionar um novo endereço, clique aqui.</a></p>
                @foreach ($enderecos as $endereco)
                <div class="row">
                        <div class="col-12">
                            Endereço: <span>{{$endereco->endereco}}</span>
                        </div>
                        <div class="col-4">
                            n&#9702 <span>{{$endereco->numero}}</span>
                        </div>
                        <div class="col-8">
                           Complemento: <span>{{$endereco->complemento}}</span>
                        </div>
                        <div class="col-6">
                           Bairro: <span>{{$endereco->bairro}}</span>
                        </div>
                        <div class="col-6">
                            Cidade: <span>{{$endereco->cidade}}</span>
                        </div>
                        <div class="col-6">
                            Estado: <span>{{$endereco->estado}}</span>
                        </div>

                        <div class="col-6">
                            Responsável: <span>{{$endereco->responsavel}}</span>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('edit-address') }}" method="POST">
                            <input type="hidden" value="{{ $endereco->cliente_id }}" name="user">
                            <input type="hidden" value="{{ $endereco->id }}" name="address">
                            {{ csrf_field() }}
                            <button type="submit">Editar</button>
                            </form>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('delete-address') }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="{{ $endereco->id }}" name="address">
                            <button type="submit">Remover</button>
                            </form>
                        </div>
                </div>
                @endforeach

            </div>

            <div class="col-10 offset-1" data-toggle="collapse" data-target="#cartao" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <h2>Cartões</h2>
             </div>
                <div class="collapse navbar-collapse col-10 offset-1" id="cartao">
                    @foreach ($cartoes as $cartao)
                        <div class="row">
                            <div class="col-6">
                                Cartão final: <span>{{ substr($cartao->numeracao, -4) }}</span>
                            </div>

                            <div class="col-6">
                                Bandeira: <span>{{$cartao->bandeira}}</span>
                            </div>

                            <div class="col-12">
                                <h3>Endereço de Cobrança</h3>
                            </div>

                            <div class="col-6">
                                Endereço: <span> {{$cartao->endereco}} </span>
                            </div>

                            <div class="col-6">
                                Bairro: <span> {{$cartao->bairro}} </span>
                            </div>

                            <div class="col-6">
                                Cidade: <span> {{$cartao->cidade}} </span>
                            </div>

                            <div class="col-6">
                                Estado: <span> {{$cartao->estado}} </span>
                            </div>

                            <div class="col-6">
                                <form action="{{ route('edit-card') }}" method="POST">
                                    <input type="hidden" value="{{ $cartao->cliente_id }}" name="user">
                                    <input type="hidden" value="{{ $cartao->id }}" name="card">
                                    {{ csrf_field() }}
                                    <button type="submit">Editar</button>
                                </form>
                            </div>

                            <div class="col-6">
                                <form action=" {{ route('edit-card') }} ">
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
             <div class="col-10 offset-1" data-toggle="collapse" data-target="#telefone" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <h2>Telefones para Contato</h2>
             </div>
             <div class="collapse navbar-collapse col-10 offset-1" id="telefone">
                 teste
 
             </div>

        </div>
    </div>
@endsection