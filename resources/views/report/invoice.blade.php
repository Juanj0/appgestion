<!DOCTYPE html>
<html >
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Factura</title>
    <link rel="stylesheet" href="{{ $route_css }}" media="all" />

  </head>
  <body>


  <header class="clearfix">


  <div class="Table">
      <div class="Row">
          <div class="Cell_Logo">
            <img src="{{ $img_logo }}"  alt="Logo"  >
          </div>
          <div class="Cell_Company">
            <h2 class="titulo">CelesteSoft</h2>
            <div>Carrasquilla, Panamá</div>
            <div>(+507) 6486-9319</div>
            <div><a href="mailto:info@jbachi.com">info@jbachi.com</a></div>
          </div>
      </div>
  </div>   



    </header>



  <div  class="Table_Details">
      <div class="Row">
        <div class="Cell_Client">
          <div class="to">DATOS DEL CLIENTE</div>
          <h2 class="titulo">{{ $Invoice->Client->nombre }}</h2>
          <div class="address">{{ $Invoice->Client->direccion }}</div>

          @if ($Invoice->Client->telefono != '')
            { <div class="address">{{ $Invoice->Client->telefono }}</div>
          @endif
          
          @if ($Invoice->Client->email != '')
            <div class="email"><a href="{{ $Invoice->Client->email }}">{{ $Invoice->Client->email }}</a></div>
          @endif
          
        </div>
        <div class="Cell_Invoice">
          <h1 class="titulo">FACTURA {{ $Invoice->numero }}</h1>
          <div class="date">Fecha: {{ $Invoice->fecha->format('m/d/Y') }}</div>
          
        </div>
      </div>
  </div>

<div class="Table">
    <div class="Heading">
        <div class="cell_cant">
            <p>Cant.</p>
        </div>
        <div class="cell_descripcion">
            <p>Descripcion</p>
        </div>
        <div class="cell_precio">
            <p>Precio</p>
        </div>
        <div class="cell_impuesto">
            <p>ITBMS</p>
        </div>
        <div class="cell_subtotal">
            <p>Total</p>
        </div>
    </div>

    {{--*/ $mTotal = 0 /*--}}

    @foreach ($Invoice->details as $Details)

    <div class="Row">
        <div class="cell_cant">
            <p>{{ @$Details->cant }}</p>
        </div>
        <div class="cell_descripcion">
            <p><b>{{ @$Details->producto }}</b></p>
            <p>{{ @$Details->descripcion }}</p>
        </div>
        <div class="cell_precio">
            <p>$ {{  @$Details->precio }}</p>
        </div>
        <div class="cell_impuesto">
            <p>{{ @$Details->impuesto }} %</p>
        </div>
        <div class="cell_subtotal">
            <p>$ {{ @$Details->total }}</p>

            {{--*/ $mTotal += $Details->total /*--}}
        </div>
    </div>

    @endforeach

</div>

<div class="Table_Totales">
{{--     <div class="Row">
        <div class="cell_vacia">
            <p></p>
        </div>
        <div class="cell_totales">
            <p>Subtotal</p>
        </div>
        <div class="cell_totales">
            <p>999.00</p>
        </div>
    </div>
    <div class="Row">
        <div class="cell_vacia">
            <p></p>
        </div>
        <div class="cell_totales">
            <p>Impuesto</p>
        </div>
        <div class="cell_totales">
            <p>999.00</p>
        </div>
    </div> --}}
    <div class="Row">
        <div class="cell_vacia">
            <p>NOTAS:</p> 
            <p>{{ $Invoice->notas}}</p>        
        </div>
        <div class="cell_gran_total">
            <p>Total</p>
        </div>
        <div class="cell_gran_total">
            <p>$ {{ number_format($mTotal,2, '.', ',')}}</p>
        </div>
    </div>
</div>

  @if ($Invoice->terminos != '')
    <div class="notices">
      <div>TERMINOS Y CONDICIONES:</div>
      <div class="notice">
          {{ $Invoice->terminos}}
      </div>
    </div>
  @endif

{{--   <div class="thanks">Thank you!</div> --}}

</main>

<footer>
{{ $Invoice->pie }}
</footer>


  </body>
</html>