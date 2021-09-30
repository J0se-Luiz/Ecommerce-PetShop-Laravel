<div class="row" style='min-height: 70px; background-color: #b7773f;'>
  <div class="col-12 col-sm-10 text-left mt-2" style="color: #351912; font-size:22px;">
   <a href="{{ route('admin.listarProdutos') }}"><img class="img-fluid" src="../../img/logosemnome.png" alt="logo" width="120px"></a>
      <strong>Admin Pata na Janta</strong>
 </div>
  @guest
  @else
  <div class="col-sm-2">
    <ul class="nav nav-pills">
      <li class="nav-item dropdown text-center" style="text-decoration: none;align-items: center;">
          <a class="nav-link dropdown-toggle mt-2 linksNavBarTitulo" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: #b7773f; ">  {{ Auth::user()->name }} <span class="caret"></span></a>
          <div class="dropdown-menu barrinha" >
          <a class="dropdown-item linkLogin" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
           {{ __('Logout') }}</a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
          </div>
        </li>
    </ul>
  </div>
</div>
@endguest
</div>
<div class="row navBar mb-3">
    @guest
    @else
    <div class="col-12 col-sm-2 d-flex justify-content-center" >
      <ul class="nav nav-pills">
          <li class="nav-item dropdown text-center " style="text-decoration: none;align-items: center;">
              <a class="nav-link dropdown-toggle mt-2 linksNavBarTitulo" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: #b86360;">Produtos</a>
              <div class="dropdown-menu barrinha" >
                <a class="dropdown-item linkNavBar" href="{{ route('admin.listarProdutos') }}">Listar Produtos</a>
                <a class="dropdown-item linkNavBar" href="{{ route('admin.adicionarProdutos')}}">Cadastrar Produto</a>
              </div>
          </li>    
      </ul>
    </div>
    <div class="col-12 col-sm-2 d-flex justify-content-start">
        <ul class="nav nav-pills">
            <li class="nav-item dropdown text-center " style="text-decoration: none;align-items: center;">
                <a class="nav-link dropdown-toggle mt-2 linksNavBarTitulo" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: #b86360;">Tipos Produto</a>
                <div class="dropdown-menu barrinha" >
                <a class="dropdown-item linkNavBar" href="{{ route('admin.listarTipoProduto') }}">Listar Tipos Produto</a>
                <a class="dropdown-item linkNavBar" href="{{ route('admin.adicionarTipoProduto')}}">Cadastrar Tipos Produto</a>
                </div>
            </li>    
        </ul>
    </div>

    <div class="col-12 col-sm-2 d-flex justify-content-start">
      <ul class="nav nav-pills">
          <li class="nav-item dropdown text-center " style="text-decoration: none;align-items: center;">
              <a class="nav-link dropdown-toggle mt-2 linksNavBarTitulo" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: #b86360;">Categorias Produto</a>
              <div class="dropdown-menu barrinha" >
              <a class="dropdown-item linkNavBar" href="{{ route('admin.listarCategoriaProduto') }}">Listar Categorias Produto</a>
              <a class="dropdown-item linkNavBar" href="{{ route('admin.adicionarCategoriaProduto')}}">Cadastrar Categorias Produto</a>
              </div>   
          </li>
      </ul>
  </div>


  <div class="col-12 col-sm-2 d-flex justify-content-end" >
    <ul class="nav nav-pills">
        <li class="nav-item dropdown text-center " style="text-decoration: none;align-items: center;">
            <a class="nav-link dropdown-toggle mt-2 linksNavBarTitulo" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: #b86360;">Status de Pedido</a>
            <div class="dropdown-menu barrinha" >
            <a class="dropdown-item linkNavBar" href="{{ route('admin.listarStatusPedido') }}">Listar Status de Pedido</a>
            <a class="dropdown-item linkNavBar" href="{{ route('admin.adicionarStatusPedido')}}">Cadastrar Status de Pedido</a>
          </div>
        </li>   
    </ul>
  </div>

  <div class="col-12 col-sm-2 d-flex justify-content-center" >
    <ul class="nav nav-pills">
        <li class="nav-item dropdown text-center " style="text-decoration: none;align-items: center;">
            <a class="nav-link dropdown-toggle mt-2 linksNavBarTitulo" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: #b86360;">Pedidos</a>
            <div class="dropdown-menu barrinha" >
            <a class="dropdown-item linkNavBar" href="{{ route('admin.listarPedido') }}">Listar Pedidos</a>
            </div>
        </li>
    </ul>
  </div>




  <div class="col-12 col-sm-1 d-flex justify-content-start">
    <ul class="nav nav-pills">
        <li class="nav-item dropdown text-center " style="text-decoration: none;align-items: center;">
            <a class="nav-link dropdown-toggle mt-2 linksNavBarTitulo" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: #b86360;">Clientes</a>
            <div class="dropdown-menu barrinha" >
            <a class="dropdown-item linkNavBar" href="{{ route('admin.usuarios') }}">Listar Clientes</a>
            </div>
        </li>
    </ul>
</div>

  @endguest
</div>
