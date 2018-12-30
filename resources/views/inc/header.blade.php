<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="/">Só Passar</a>
  @auth
<a href="{{route('shoppingCart')}}" class="dropdown-item" id="carrinho">Carrinho <span class="badge badge-pill badge-success">{{Session::has('cart') ? Session::get('cart')->totalQt : ""}}</span> </a>
  @endauth
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">&equiv;</span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      @guest
        <a href="{{ route('login') }}" class="dropdown-item">Login</a>
        <a href="{{ route('register') }}" class="dropdown-item">Register</a>
        @else
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();" class="dropdown-item">
                                      Logout
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Meus Pedidos</a>
                          </div>
                        </li>
                 @endguest
    </ul>
  </div>
</nav>