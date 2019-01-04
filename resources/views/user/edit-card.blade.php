@extends('layout.main')

@section('conteudo')
    <div class="row checkout">
        <div class="col-8 col-md-6 offset-md-3 offset-2">
            <h2>Alterar cartão de crédito</h2>
        <p><a href="{{ url()->previous() }}">voltar</a></p>
            <form action="{{route('card')}}" method="POST">
                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="bandeira">Bandeira</label>
                            <input type="text" id="bandeira" name="bandeira" class="form-control" value="{{$cartao->bandeira}}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="titular">Titular</label>
                        <input type="text" id="titular" name="titular" class="form-control" value="{{$cartao->titular}}" required>
                            @if ($errors->has('titular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titular') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="numeracao">Numero do cartão</label>
                            <input type="text" id="numeracao" name="numeracao" class="form-control" value="{{$cartao->numeracao}}" required>
                        </div>
                        @if ($errors->has('numeracao'))
                        <span class="help-block">
                            <strong>{{ $errors->first('numeracao') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <fieldset>
                                    <legend>Data de expiração</legend>
                                    <label for="mes">Mês</label>
                                    <input type="number" id="mes" name="mes" class="form-control" value="{{$cartao->mes}}" required>
                                    @if ($errors->has('mes'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mes') }}</strong>
                                            </span>
                                        @endif
        
                                    <label for="ano">Ano</label>
                                    <input type="number" id="ano" name="ano" class="form-control" value="{{$cartao->ano}}" required>
                                    @if ($errors->has('ano'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ano') }}</strong>
                                            </span>
                                    @endif
                            </fieldset>
                        </div>
                    </div>

                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="cvc">CVC</label>
                            <input type="number" id="cvc" name="cvc" class="form-control" value="{{$cartao->cvc}}" required>
                        </div>
                        @if ($errors->has('cvc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cvc') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="col-6">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" id="endereco" name="endereco" class="form-control" value="{{$cartao->endereco}}" required>
                        </div>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong>{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-6">
                            <div class="form-group">
                                <label for="numero">Número</label>
                                <input type="number" id="numero" name="numero" class="form-control" value="{{$cartao->numero}}" required>
                            </div>
                            @if ($errors->has('numero'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" id="complemento" name="complemento" class="form-control" value="{{$cartao->complemento}}">
                        </div>
                        @if ($errors->has('complemento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('complemento') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" class="form-control" value="{{$cartao->bairro}}" required>
                        </div>
                        @if ($errors->has('bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade" class="form-control" value="{{$cartao->cidade}}" required>
                        </div>
                        @if ($errors->has('cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" id="estado" name="estado" class="form-control" value="{{$cartao->estado}}" required>
                        <input type="hidden" name="url" class="form-control" value="{{url()->previous()}}">
                        </div>
                        @if ($errors->has('estado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('estado') }}</strong>
                            </span>
                        @endif
                    </div>
                    <input type="hidden" name="id" value="{{$cartao->id}}">
                    <input type="hidden" name="url" value="{{ url()->previous() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-12">
                        <label>Deseja Salvar?</label>
                        <button type="submit" class="btn btn-success">Salvar cartão</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection