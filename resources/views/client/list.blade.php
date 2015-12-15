@extends('layouts.theme')


@section('content')


	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Listado de Clientes</div>
	  <div class="panel-body">
	    <p>
			<a href="{{ route('clientes.create') }}" class="btn  btn-info"><i class="fa fa-plus"></i> Nuevo Cliente</a>
	    </p>
	  </div>

	  <!-- Table -->
	  <table class="table table-hover">
	  	<thead>
            <tr>
              <th style="width: 5%;">#</th>
              <th style="width: 85%;">Nombre</th>
              <th style="width: 10%;">Opciones</th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($Clients as $Client)
            <tr>
              <td>{{ $Client->id }} </td>
              <td>{!! link_to_route('clientes.show', $title = $Client->nombre , 
			$parameters = array($Client->id), 
			$attributes = array('data-toggle' => 'modal',
								'data-target' => '#myModal_Cliente',
								)); !!}



			  	</td>
 				<td>

 				<a href="{{ route('clientes.edit', $Client->id) }}" class="btn  btn-xs btn-warning"><i class="fa fa-pencil"></i></a>

				 <button type="button" 
				 data-client_id="{{ $Client->id }}" 
				 data-client_nombre="{{ $Client->nombre }}" 
				 data-client_destroy_route="{{ route('clientes.destroy', $Client->id) }}"
				 class="btn  btn-xs btn-danger" data-toggle="modal" data-target="#confirmDelete"><i class="fa fa-times"></i></button>

               </td>
            </tr>
            @endforeach
          </tbody>
	  </table>
	</div>
  <div class="media-body">
	<div  class="pull-right">{!! $Clients->render() !!}</div>
  </div>
	


<!-- Modal -->
<div class="modal fade" id="myModal_Cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>


<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Confirmación</h4>
		</div>

    	<div class="modal-body">
		    <p>¿Realmente desea eliminar el Cliente: <span id="pName"></span>?</p>
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

	$('#myModal_Cliente').on('show.bs.modal', function (e) {
	  $('#myModal_Cliente').removeData('bs.modal');
	});


	$('#confirmDelete').on('show.bs.modal', function(e) {
	    //get data-id attribute of the clicked element
	        var mId = $(e.relatedTarget).data('client_id');
	        var mNombre = $(e.relatedTarget).data('client_nombre');
	        var mRoute = $(e.relatedTarget).data('client_destroy_route');
	    $("#confirmDelete #pName").text( mNombre );
	    $("#delForm").attr('action', mRoute);//e.g. 'domainname/products/' + productId
	});

</script>

@endsection

