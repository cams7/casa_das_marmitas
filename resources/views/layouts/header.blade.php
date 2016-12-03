<div class="navbar-header">
  <!--button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>                        
  </button-->
  <img src="{{ URL::asset('img/casa_das_marmitas-logo.png') }}" alt="Casa das marmitas" title="Casa das marmitas" class="navbar-brand">
</div>
<div class="collapse navbar-collapse" id="myNavbar">
  <ul class="nav navbar-nav">
    <li class="active"><a href="/">Home</a></li>
    <li><a href="{{ URL::to('funcionarios') }}">Funcionários</a></li>
    <li><a href="{{ URL::to('empresas') }}">Empresa</a></li>
    <li><a href="{{ URL::to('entregadores') }}">Entregadores</a></li>
    <li><a href="{{ URL::to('produto') }}">Produtos</a></li>
    <li><a href="{{ URL::to('cliente') }}">Clientes</a></li>
    <li><a href="{{ URL::to('taxas') }}">Taxas</a></li>
    <li><a href="{{ URL::to('pedidos') }}">Pedidos</a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  </ul>
</div>