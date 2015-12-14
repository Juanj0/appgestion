
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>AppGestión</title>

    <style type="text/css">
      .a_derecha {
        text-align: right;
      }

  footer {
    margin-top: 15px;
    padding-top: 15px;
    bottom: 0;
    width: 100%;
    /* Set the fixed height of the footer here */
    height: 60px;
    background-color: #2E8BCC;
    color: #fff;

  }

  .gly-spin {
    -webkit-animation: spin 2s infinite linear;
    -moz-animation: spin 2s infinite linear;
    -o-animation: spin 2s infinite linear;
    animation: spin 2s infinite linear;
  }
  @-moz-keyframes spin {
    0% {
      -moz-transform: rotate(0deg);
    }
    100% {
      -moz-transform: rotate(359deg);
    }
  }
  @-webkit-keyframes spin {
    0% {
      -webkit-transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(359deg);
    }
  }
  @-o-keyframes spin {
    0% {
      -o-transform: rotate(0deg);
    }
    100% {
      -o-transform: rotate(359deg);
    }
  }
  @keyframes spin {
    0% {
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(359deg);
      transform: rotate(359deg);
    }
  }

    </style>
    <!-- Bootstrap -->
    {!! Html::style( asset('plugins/bootstrap/css/metro-bootstrap.css')) !!}
    {!! Html::style( asset('plugins/bootstrap/css/navbar-fixed-top.css')) !!}
    {!! Html::style( asset('plugins/bootstrap/css/select2.css')) !!}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AppGestion</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is( 'home') ? 'active' : '' }}"><a href="{{ url('/')  }}">Home</a></li>


        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="{{route('auth/login')}}">Iniciar Sesion</a></li>
            <li><a href="{{route('auth/register')}}">Registrarse</a></li>
            @else

            <li>
                <a href="#">{{ Auth::user()->name }}</a>
            </li>

            <li class="{{ Request::is( 'clientes*') ? 'active' : '' }}">{!! link_to_route('clientes.index', $title = 'Clientes'); !!}</li>

            <li class="{{ Request::is( 'facturas*') ? 'active dropdown' : 'dropdown' }}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Facturas<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li >{!! link_to_route('facturas.create', 'Nueva Factura' , $parameters = array(), $attributes = array('data-toggle' => 'modal',
                      'data-target' => '#modalNewInvoice', )); !!}</li>
                <li >{!! link_to_route('facturas.index', 'Ver Facturas'); !!}</li>
              </ul>
            </li>

            <li><a href="{{route('auth/logout')}}">Cerrar Sesión</a></li>
                    
            @endif
        </ul>

                        
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#contact">Contacto</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      @if (Session::has('errors'))
        <div class="alert alert-warning" role="alert">
      <ul>
              <strong>Oops! Something went wrong : </strong>
          @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif  

        @include('flash::message')
        @yield('content')
    </div> <!-- /container -->




  <!-- Modal Nueva Factira-->
  <div class="modal fade" id="modalNewInvoice" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      </div>
    </div>
  </div>



<footer class="footer">
  <div class="container">
    <p > <b>Realizado por Joel J. Barrios Ch.</b></p>
  </div>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {!! Html::script( asset('plugins/jquery/js/jquery.min.js')) !!}
    {!! Html::script( asset('plugins/jquery/js/select2.js')) !!}

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {!! Html::script( asset('plugins/bootstrap/js/bootstrap.min.js')) !!}


<script>

/*
  $(".chosen-select").select2();

  $('#modalNewInvoice').on('show.bs.modal', function(e) {
      alert('hola');
  });
*/
</script>


    @yield('script')


  </body>
</html>
