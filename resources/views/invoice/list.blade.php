@extends('layouts.theme')

@section('content')


	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Facturas</div>
	  <div class="panel-body">

	  </div>

	  <!-- Table -->
	  <table class="table table-hover">
	  	<thead>
            <tr>
              <th class="text-center"  style="width: 5%;">#</th>
              <th class="text-center" style="width: 10%;">Número</th>
              <th class="text-center" style="width: 10%;">Fecha</th>
              <th style="width: 55%;">Cliente</th>
              <th class="text-center" style="width: 10%;">Monto</th>
              <th  style="width: 10%;"></th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($Invoices as $Invoice)
            <tr>
              <td class="text-center" >{{ $Invoice->id }} </td>
              <td class="text-center" >{{ $Invoice->numero }} </td>
              <td class="text-center" >{{ $Invoice->fecha->format('d-m-Y') }} </td>
              <td>{{ $Invoice->client->nombre }} </td>
 			  <td class="text-center">$ {{ $Invoice->sumTotal()  }} </td>
 			  <td>


 				<a href="{{ route('facturas.edit', $Invoice->id) }}" class="btn  btn-xs btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

  				<a href="{{ route('pdf', $Invoice->id) }}" class="btn  btn-xs btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>

				 <button type="button" 
				 data-id="{{ $Invoice->id }}" 
				 data-numero="{{ $Invoice->numero }}" 
				 data-destroy_route="{{ route('facturas.destroy', $Invoice->id) }}"
				 class="btn  btn-xs btn-danger" data-toggle="modal" data-target="#confirmDelete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>


 			  </td>
            </tr>
            @endforeach
          </tbody>
	  </table>
	</div>
	{!! $Invoices->render() !!}




<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Confirmación</h4>
		</div>

    	<div class="modal-body">
		    <p>¿Realmente desea eliminar la factura: <span id="pName"></span>?</p>
		</div>

		<div class="modal-footer">
			{!! Form::open(['method' => 'DELETE', 'id'=>'delForm']) !!}
			    <button type="submit" class="btn btn-danger" >Eliminar</button>
			 {!! Form::close() !!}
		</div>


    </div>
  </div>
</div>





@endsection


@section('script')

<script>

	$('#confirmDelete').on('show.bs.modal', function(e) {
	    //get data-id attribute of the clicked element
	        var mId = $(e.relatedTarget).data('id');
	        var mNombre = $(e.relatedTarget).data('numero');
	        var mRoute = $(e.relatedTarget).data('destroy_route');
	    $("#confirmDelete #pName").text( mNombre );
	    $("#delForm").attr('action', mRoute);//e.g. 'domainname/products/' + productId
	});

</script>

@endsection

