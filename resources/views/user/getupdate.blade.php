@extends('layout.main')

@section('conteudo')
<div class="row checkout">
    <div class="col-8 col-md-6 offset-md-3 offset-2">
        <h2>Alterar endereço</h2>
        <form action="{{route('edit-address')}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                    <label for="responsavel">Nome do responsável para entregar/receber roupas</label>
                    <input type="text" id="responsavel" name="responsavel" class="form-control" value="{{$endereco[0]['responsavel']}}" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" id="endereco" name="endereco" class="form-control" value="{{$endereco[0]['endereco']}}" required>
                    </div>
                </div>
                <div class="col-2">
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="number" id="numero" name="numero" class="form-control" value="{{$endereco[0]['numero']}}" required>
                        </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" id="complemento" name="complemento" class="form-control" value="{{$endereco[0]['complemento']}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" id="bairro" name="bairro" class="form-control" value="{{$endereco[0]['bairro']}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <input type="text" id="cidade" name="cidade" class="form-control" value="{{$endereco[0]['cidade']}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" id="estado" name="estado" class="form-control" value="{{$endereco[0]['estado']}}">
                        <input type="hidden" name="address" class="form-control" value="{{$endereco[0]['id']}}">
                        <input type="hidden" name="user" class="form-control" value="{{$endereco[0]['user_id']}}">
                    <input type="hidden" name="url" class="form-control" value="{{$url}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Salvar endereço</button>
            </div>
        </form>
    </div>
</div>
@endsection