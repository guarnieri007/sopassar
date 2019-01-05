@extends('layout.main')

@section('conteudo')
    <div class="row checkout">
        <div class="col-10 col-lg-6 offset-lg-3 offset-1">
            <h2>Cadastrar novo endereço</h2>
        <p><a href="{{ url()->previous() }}">voltar</a></p>
            <form action="{{route('postAddress')}}" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="responsavel">Nome do responsável para entregar/receber roupas</label>
                            <input type="text" id="responsavel" name="responsavel" class="form-control" required>
                            @if ($errors->has('responsavel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('responsavel') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" id="endereco" name="endereco" class="form-control" required>
                        </div>
                        @if ($errors->has('endereco'))
                        <span class="help-block">
                            <strong>{{ $errors->first('endereco') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-4">
                            <div class="form-group">
                                <label for="numero">Número</label>
                                <input type="number" id="numero" name="numero" class="form-control" required>
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
                            <input type="text" id="complemento" name="complemento" class="form-control">
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
                            <input type="text" id="bairro" name="bairro" class="form-control">
                        </div>
                        @if ($errors->has('bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade" class="form-control">
                        </div>
                        @if ($errors->has('cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" id="estado" name="estado" class="form-control">
                        <input type="hidden" name="url" class="form-control" value="{{url()->previous()}}">
                        </div>
                        @if ($errors->has('estado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                    </div>
                    
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label>Deseja Salvar?</label>
                        <button type="submit" class="btn btn-success">Salvar endereço</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection