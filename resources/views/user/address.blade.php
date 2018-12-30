@extends('layout.main')

@section('conteudo')
    <div class="row checkout">
        <div class="col-8 col-md-6 offset-md-3 offset-2">
            <h2>Cadastrar novo endereço</h2>
            <form action="{{route('postAddress')}}" method="POST">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="responsavel">Nome do responsável para entregar/receber roupas</label>
                            <input type="text" id="responsavel" name="responsavel" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-10 col-xs-10">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" id="endereco" name="endereco" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-xs-2">
                            <div class="form-group">
                                <label for="numero">Número</label>
                                <input type="number" id="numero" name="numero" class="form-control" required>
                            </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" id="complemento" name="complemento" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group">
                            <label for="city">Cidade</label>
                            <input type="text" id="cidade" name="cidade" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-4">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" id="estado" name="estado" class="form-control">
                        <input type="hidden" name="url" class="form-control" value="{{url()->previous()}}">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success">Salvar endereço</button>
                </div>
            </form>
        </div>
    </div>
@endsection