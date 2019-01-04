@extends('layout.main')
@section('conteudo')
    <div class="row checkout">
        <div class="col-8 col-md-6 offset-md-3 offset-2">
            <h2>Cadastrar telefone</h2>
        <p><a href="{{ url()->previous() }}">voltar</a></p>
            <form action="{{route('postTelefone')}}" method="POST">
                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="telefone">Numero</label>
                            <input type="text" id="telefone" name="telefone" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <input type="text" id="tipo" name="tipo" class="form-control" required>
                            @if ($errors->has('titular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titular') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>


                    <input type="hidden" name="url" value="{{ url()->previous() }}">
                <input type="hidden" name="cliente_id" value="{{ Auth()->user()->id }}">
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label>Deseja Salvar?</label>
                        <button type="submit" class="btn btn-success">Salvar cartão</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection