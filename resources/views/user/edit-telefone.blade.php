@extends('layout.main')

@section('conteudo')
    <div class="row checkout">
        <div class="col-10 col-lg-6 offset-lg-3 offset-1">
            <h2>Editar Telefone</h2>
        <p><a href="{{ url()->previous() }}">voltar</a></p>
            <form action="{{route('putTelefone')}}" method="POST">
                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="telefone">Numero</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" value="{{$telefone->telefone}}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <input type="text" id="tipo" name="tipo" class="form-control" required value="{{$telefone->tipo}}">
                            @if ($errors->has('titular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titular') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <input type="hidden" name="url" value="{{ url()->previous() }}">
                    <input type="hidden" name="cliente_id" value="{{ $telefone->cliente_id }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $telefone->id }}">
                    <div class="col-12">
                        <label>Deseja Salvar?</label>
                        <button type="submit" class="btn btn-success">Salvar cartão</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection