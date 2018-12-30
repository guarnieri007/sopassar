@extends('layout.main')

@section('conteudo')
    <div class="conteudo">
        
        <div class="header">
            <h1>Só Passar</h1>
        </div>
        <p><destaque>Só Passar</destaque> é um serviço de passar roupas indicado para pessoas que possuem máquina de lavar mas que não querem gastar tempo passando nem pagar uma fortuna em lavanderias.</p>
    </div>

    <div class="explicacao">
       <ul>
           <li>Buscamos e entregamos sua roupa</li>
       </ul>
    </div>


    <div class="pacotes" id="pacotes">
        <h1>Escolha seu Plano</h1>
        <div class="carousel">
            @foreach ($produtos as $produto)
                <div class="mySlides">
                <img src="{{$produto->imagePath}}" {{ $produto->quantidade > 1 ? '' : 'class=unitario' }}>
                    <h1>{{$produto->plano}}</h1>
                    @if ($produto->quantidade > 1)
                    <h2>{{$produto->quantidade}} peças<br>por R${{ number_format($produto->preco,2, ',', '.')}}</h2>
                    <h3>R${{number_format($produto->preco / $produto->quantidade,2, ',', '.') }} por peça</h3>
                        @else
                        <h2>{{$produto->quantidade}} unidade<br>por R${{ number_format($produto->preco,2, ',', '.')}}</h2>
                    @endif
                    <a href="{{ route('cart.add', $produto->id)}}" class="btn btn-success">Contratar</a>
                </div>
            @endforeach
            <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>
        </div>
    </div>
<!--
    <div class="contato">
        <h1>Mande sua mensagem</h1>
        <div>

        </div>
            
    </div>
    -->
    
@endsection