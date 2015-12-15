@extends('layouts.theme')



@section('content')

<p><a id="saveInvoice" href="#" >Guardar Factura</a></p>

  <div class="row">

  <div class="col-md-4">
	<div id="loading_save_invoice"></div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Datos del Cliente</h3>
	  </div>
	  <div class="panel-body">

			@if (isset( $Invoice->id))
				{!! Form::open(['route' => ['facturas.update', $Invoice], 'method' => 'PUT', 'id' => 'form_edit']) !!}
							{!! Form::close() !!}

			@else
				{!! Form::open(['route' => 'facturas.store', 'method' => 'POST']) !!}
				{!! Form::close() !!}
			@endif

		    <div class="form-group">
				{!! Form::label('client_id', 'Nombre del Cliente'); !!}
				{!! Form::select('client_id', $Clients, @$Invoice->client_id, ['class' => 'chosen-select form-control', 'placeholder' => 'Seleccione']); !!}
		    </div>

	  </div>
	</div>



  </div>

  <div class="col-md-4">

  </div>

  <div class="col-md-4">

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Datos de la Factura</h3>
	  </div>
	  <div class="panel-body">

		    <div class="form-group">
				{!! Form::label('numero', 'Número'); !!}
				{!! Form::text('numero', @$Invoice->numero,['class' => 'form-control', 'required']); !!}
		    </div>

		    <div class="form-group">
				{!! Form::label('fecha', 'Fecha'); !!}
				{!! Form::date('fecha', @$Invoice->fecha,['class' => 'form-control']);; !!}
		    </div>

	  </div>
	</div>

  </div>

  </div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Detalle de la Factura</h3>
  </div>
  <div class="panel-body">

	<div class="row">
	<div class="col-md-12">

		  <table  id="myTable" class="table table-hover">
		  	<thead>
	            <tr>
	              <th >Producto</th>
	              <th >Descripcion</th>
	              <th >Cant</th>
	              <th >Precio</th>
	              <th >Impuesto</th>
	              <th >Total</th>
	              <th ></th>
	            </tr>
	        </thead>
	        <tbody>
	        	

				@foreach ($Invoice->details as $Details)


			<tr  id='tr_{!! $Details->id !!}' data-id='{!! $Details->id !!}' >
			{!! Form::open(['route' => ['detalles.update', $Details], 'method' => 'PUT', 'id' => 'form_'.$Details->id]) !!}

			<td>
				{!! Form::hidden('invoice_id', @$Details->invoice_id,['class' => 'form-control']); !!}
				{!! Form::text('producto', @$Details->producto,['class' => 'form-control', 'required']); !!}
			</td>
			<td>{!! Form::textarea('descripcion', @$Details->descripcion,['class' => 'form-control', 'cols'=>'50' , 'rows'=>'1']); !!}</td>
			<td>{!! Form::number('cant', @$Details->cant,['class' => 'calculate a_derecha form-control', 'required']); !!}</td>
			<td>{!! Form::number('precio', @$Details->precio,['class' => 'calculate a_derecha form-control', 'required']); !!}</td>
			<td>{!! Form::number('impuesto', @$Details->impuesto,['class' => 'calculate a_derecha form-control', 'required']); !!}</td>
			<td>{!! Form::number('total', @$Details->total,['class' => 'calculate a_derecha form-control', 'required','readonly']); !!}
				

			<td><button type="submit" class="saveItem btn btn-xs btn-info"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>

				 <button type="button" 
				 data-id="{{ $Details->id }}" 
				 data-nombre="{{ $Details->producto }}" 
				 data-destroy_route="{{ route('detalles.destroy', $Details->id) }}"
				 class="btn  btn-xs btn-danger" data-toggle="modal" data-target="#confirmDelete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>


				<div id="loading_{!! $Details->id !!}"></div></td></td>
			
		{!! Form::close() !!}

		</tr>


				@endforeach


	            <tr id='tr_0' data-id='0' class='init' >

	            {!! Form::open(['route' => 'detalles.store', 'method' => 'POST', 'id' => 'form_0', 'name' => 'form_0']) !!}
	              <td>
					{!! Form::hidden('invoice_id', @$Invoice->id,['class' => 'form-control']); !!}
	              	{!! Form::text('producto', null,['class' => 'form-control', 'required']); !!}
	              </td>
	              <td>{!! Form::textarea('descripcion', null,['class' => 'form-control', 'cols'=>'50' , 'rows'=>'1']); !!}</td>
	              <td>{!! Form::number('cant', null,['class' => 'calculate a_derecha form-control','required']); !!}</td>
	              <td>{!! Form::number('precio', null,['class' => 'calculate a_derecha form-control',  'required']); !!}</td>
	              <td>{!! Form::number('impuesto', null,['class' => 'calculate a_derecha form-control', 'required']); !!}</td>
	              <td>{!! Form::number('total', null,['class' => 'calculate a_derecha form-control', 'required','readonly']); !!}
	              	
	            <td><button type="submit" class="saveItem btn btn-xs btn-info"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button><div id="loading_0"></div></td></td>
	            {!! Form::close() !!}

	            </tr>

	          </tbody>
		  </table>

		</div>
	  </div>

	<div class="row">
	<div class="col-md-9">
		
		{!! Form::label('notas', 'Notas'); !!}
		{!! Form::textarea('notas', @$Invoice->notas,['class' => 'form-control', 'cols'=>'50' , 'rows'=>'2']); !!}
	</div>	
	<div class="col-md-3">
		  <div class='a_derecha'>
					<div>
					{!! Form::label('subtotal', 'Subtotal'); !!}
					{!! Form::label('subtotal_mto', '0.00', ['id' => 'subtotal_mto']); !!}
					</div>

					<div>
					{!! Form::label('impuesto', 'Impuesto'); !!}
					{!! Form::label('impuesto_mto', '0.00', ['id' => 'impuesto_mto']); !!}
					</div>

					<div>
					{!! Form::label('total', 'Total'); !!}
					{!! Form::label('total_mto', '0.00', ['id' => 'total_mto']); !!}
					</div>

		  </div>
	</div>	
	</div>

</div>	
</div>


<div class="row">

  <div class="col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Terminos y Condiciones</h3>
	  </div>
	  <div class="panel-body">
	    {!! Form::textarea('terminos', @$Invoice->terminos,['class' => 'form-control', 'cols'=>'50' , 'rows'=>'2', 'id' => 'terminos']); !!}
	  </div>
	</div>
  </div>

  <div class="col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Pie de Página</h3>
	  </div>
	  <div class="panel-body">
	    {!! Form::textarea('pie', @$Invoice->pie,['class' => 'form-control', 'cols'=>'50' , 'rows'=>'2', 'id' => 'pie']); !!}
	  </div>
	</div>
  </div>


</div>

<div class="row">
	<div id="result_invoice">
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
		    <p>¿Realmente desea eliminar el Cliente: <span id="pName"></span>?
				<span id="pId"></span>
		    </p>
		</div>

		<div class="modal-footer">
			{!! Form::open(['method' => 'DELETE', 'id'=>'delForm']) !!}
			    <button type="submit" class="btn btn-danger" id="btn_delete" data-dismiss="modal" >Eliminar</button>
			 {!! Form::close() !!}
		</div>


    </div>
  </div>
</div>


@endsection



@section('script')

<script >


 $( "#btn_delete" ).click(function (event) {
	event.preventDefault();

	var mForm = $("form#delForm");
	var route = mForm.attr('action');
	var mserialize = mForm.serialize();
	var mId = $("#pId").text();


			$.post( route, mserialize)
			  .done(function( data ) {
			  	$("#tr_"+mId).fadeOut();

			  }).fail(function(response) {
			if (response.status == 400) {
				showErrors($.parseJSON(response.responseText).errors, '#form-status-placeholder');
				$("#loading_"+id).empty();
			} else {
				alert('Unknown Error');
			}
		});



 });


$('#confirmDelete').on('show.bs.modal', function(e) {
	    //get data-id attribute of the clicked element
	        var mId = $(e.relatedTarget).data('id');
	        var mNombre = $(e.relatedTarget).data('producto');
	        var mRoute = $(e.relatedTarget).data('destroy_route');
	    $("#confirmDelete #pName").text( mNombre );
	    $("#confirmDelete #pId").text( mId );
	    $("#delForm").attr('action', mRoute);//e.g. 'domainname/products/' + productId
	});


function mMisCalculos(){

            	var sum_subtotal = 0;
		        var sum_impuesto = 0;
	        	var sum_total = 0;

				$("#myTable tbody tr").each(function (index) 
		        {

		            $(this).children("td").each(function (index2) 
		            {


		            	switch (index2) 
		                {
		                    case 2: 
		                    		cant = $(this).find('input').val();
									if($.isNumeric(cant)) {
									}else {
										cant = 0;
									};
		                            break;
		                    case 3: 

	                    			precio = $(this).find('input').val();
									if($.isNumeric(precio)) {
									}else {
										precio = 0;
									};
		                            break;
		                    case 4: 

	                    			impuesto = $(this).find('input').val();
									if($.isNumeric(impuesto)) {
									}else {
										impuesto = 0;
									};
		                            break;

		                    case 5: 
									precio_total = cant * precio;
									impuesto_total = precio_total * (impuesto / 100);
									total = precio_total + impuesto_total;

									sum_subtotal += precio_total;
									sum_impuesto+= impuesto_total;
									sum_total += total;

									$(this).find('input').val(total.toFixed(2));


						
		                            break;
		                }
		                

		            })
				
				$("#subtotal_mto").text(sum_subtotal.toFixed(2));
				$("#impuesto_mto").text(sum_impuesto.toFixed(2));
				$("#total_mto").text(sum_total.toFixed(2));
		           

		        })

}


function mCalcular () {

        $(".calculate").each(function () {
			mMisCalculos();
            });

}



    $(document).ready(function() {

    	mMisCalculos();

    	$(".chosen-select").select2();

	    $("#myTable").on("keyup", "input[type=number]", function(){
	    	mCalcular();
	    });

	    $("body").on("submit", "form", function(){
	    	alert('Enviando');
	    });

		$("#myTable").on("click", "button[type=submit]", function(event){
    		event.preventDefault();
	    	//alert('Accion Prevenida');

	    	var route_edit = "{{ route('detalles.edit', 'ID_ITEM') }}";

	    	var row = $(this).parents('tr');
	    	var id = row.data('id');
	    	var mForm = $("form#form_"+id);
			var route = mForm.attr('action');
	    	var mserialize = mForm.serialize();
			var linea = '';

	    	//alert(id);
	    	//alert(route+'-----------'+mForm.attr('class'));
	    	//alert(mserialize);


			$("#myTable tbody tr#tr_"+id).each(function (index) {
	            $(this).eq(0).find('input,textarea').each(function (index3){
	            	if (typeof $(this).attr('name')  !== "undefined"){
						linea += $(this).attr('name') +'=' + $(this).val() + "&";
	            	};
	            });
			});


			//$("#loading_"+id).empty().html('<button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-repeat gly-spin"></span></button>');

			$("#loading_save_invoice").empty().html('<button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-repeat gly-spin"></span></button>');

			$.post( route, linea)
			  .done(function( data ) {

			  		if (id == 0) {
				    	$.get( route_edit.replace('ID_ITEM',data), function( data ) {
					    	$("#myTable tr.init").before(data);
						});
						$(mForm).each(function(){
						    this.reset();
						});
			  		}else{

			  		};

				$("#loading_"+id).empty();

			  }).fail(function(response) {
			if (response.status == 400) {
				showErrors($.parseJSON(response.responseText).errors, '#form-status-placeholder');
				$("#loading_"+id).empty();
			} else {
				//alert('Unknown Error');
				$("#loading_"+id).empty();
			}
		});




		});


    });



    $( "#saveInvoice" ).click(function () {



		$("#loading_save_invoice").empty().html('<button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-repeat gly-spin"></span></button>');

		$(".saveItem").each(function (index) {
			$(this).click();
		});

		var route_invoice = "{{ route('facturas.edit', 5) }}";
		var linea = '';
    	var mForm = $("form#form_edit");
		var route = mForm.attr('action');

		$(mForm).each(function (index) {
            $(this).find('input').each(function (index3){
            	if (typeof $(this).attr('name')  !== "undefined"){
					linea += $(this).attr('name') +'=' + $(this).val() + "&";
            	};
            });
		});

		linea += 'client_id=' + $('#client_id').val() + "&";
		linea += 'numero=' + $('#numero').val() + "&";
		linea += 'fecha=' + $('#fecha').val() + "&";
		linea += 'notas=' + $('#notas').val() + "&";
		linea += 'terminos=' + $('#terminos').val() + "&";
		linea += 'pie=' + $('#pie').val() + "";
		//alert(linea);

		$.post( route, linea).done(function( data ) {

				$("#result_invoice").append(data);
				window.location = route_invoice;
				//alert('aholla::: ' + data);

		  }).fail(function(response) {
			if (response.status == 400) {
				showErrors($.parseJSON(response.responseText).errors, '#form-status-placeholder');
			} else {
				alert('Unknown Error');
			}
		});


		//$("#loading_save_invoice").empty();

    });



</script>


@endsection
