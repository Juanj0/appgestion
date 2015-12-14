@extends('layouts.app')


@section('content')


<div class="row">
	<div class="col-md-4">
		@if (isset( $Invoice->id))
			<h1>Editando Factura: {!! $Invoice->nombre !!}</h1>
		@else
			<h1>Nueva Factura</h1>
		@endif

		@if (isset( $Invoice->id))
			{!! Form::open(['route' => ['facturas.update', $Invoice], 'method' => 'PUT']) !!}
		@else
			{!! Form::open(['route' => 'facturas.store', 'method' => 'POST']) !!}
		@endif

		    <div class="form-group">
				{!! Form::label('client_id', 'Nombre del Cliente'); !!}
				{!! Form::select('client_id', $Clients, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']); !!}
		    </div>

		    <div class="form-group">
				{!! Form::label('numero', 'Número'); !!}
				{!! Form::text('numero', null,['class' => 'form-control', 'required']); !!}
		    </div>

		    <div class="form-group">
				{!! Form::label('fecha', 'Fecha'); !!}
				{!! Form::date('fecha', null,['class' => 'form-control']);; !!}
		    </div>

		    <div class="form-group">
				{!! Form::label('notas', 'Notas'); !!}
				{!! Form::textarea('notas', null,['class' => 'form-control']); !!}
		    </div>

		    <div class="form-group">
				{!! Form::label('terminos', 'Terminos'); !!}
				{!! Form::textarea('terminos', null,['class' => 'form-control']); !!}
		    </div>

		    <div class="form-group">
				{!! Form::label('pie', 'Pie de Página'); !!}
				{!! Form::textarea('pie', null,['class' => 'form-control']); !!}
		    </div>


		    <div class="form-group">
				@if (isset( $Invoice->id))
					{!! Form::submit('Editar Factura',['class' => 'btn btn-warning']); !!}
				@else
					{!! Form::submit('Crear Factura',['class' => 'btn btn-warning']); !!}
				@endif
		    </div>

		{!! Form::close() !!}
  </div>
  <div class="col-md-8">

	  <table  id="myTable" class="table table-hover">
	  	<thead>
            <tr>
              <th >Producto</th>
              <th >Descripcion</th>
              <th >Cant</th>
              <th >Precio</th>
              <th >Impuesto</th>
              <th >Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{!! Form::text('producto', null,['class' => 'form-control', 'required']); !!}</td>
              <td>{!! Form::textarea('descripcion', null,['class' => 'form-control', 'cols'=>'50' , 'rows'=>'2']); !!}</td>
              <td>{!! Form::number('cant', null,['class' => 'calculate form-control', 'required']); !!}</td>
              <td>{!! Form::number('precio', null,['class' => 'calculate form-control', 'required']); !!}</td>
              <td>{!! Form::number('impuesto', null,['class' => 'calculate form-control', 'required']); !!}</td>
              <td>0.00</td>
            </tr>
          </tbody>
	  </table>

	  <div>
		    <div class="form-group">
				{!! Form::label('subtotal', 'Subtotal'); !!}
				{!! Form::label('subtotal_mto', '0.00', ['id' => 'subtotal_mto']); !!}
		    </div>

		    <div class="form-group">
				{!! Form::label('impuesto', 'Impuesto'); !!}
				{!! Form::label('impuesto_mto', '0.00', ['id' => 'impuesto_mto']); !!}
		    </div>

		    <div class="form-group">
				{!! Form::label('total', 'Total'); !!}
				{!! Form::label('total_mto', '0.00', ['id' => 'total_mto']); !!}
		    </div>

	  </div>

	</div>
	<p><a id="insert-more" href="#" >Agregar Linea</a></p>
	<p><a id="btnRecorrer" href="#" >Recorrer</a></p>
	<p><a id="saveInvoice" href="#" >Guardar</a></p>
	
	<div id="result"></div>

  </div>
</div>



<script >

function mCalcular () {
        //iterate through each textboxes and add keyup
        //handler to trigger sum event
        $(".calculate").each(function () {
            $(this).keyup(function () {

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

									$(this).html(total.toFixed(2));						
		                            break;
		                }
		                

		            })
				
				$("#subtotal_mto").text(sum_subtotal.toFixed(2));
				$("#impuesto_mto").text(sum_impuesto.toFixed(2));
				$("#total_mto").text(sum_total.toFixed(2));
		           

		        })
            });
        });



}



    $( ".calculate" ).keyup(function () {
    	mCalcular();

    });


    $( "#saveInvoice" ).click(function () {

		var items = [];
		var item_order = 30;
		$('#myTable tbody tr').each(function() {
			var row = {};
			$(this).find('input,textarea').each(function() {
				row[$(this).attr('name')] = $(this).val();
			});
			row['item_order'] = item_order;
			item_order++;
			items.push(row);

		});

		//$.each(items, function( index, value ) {
		//  alert( index + ": " + value['item_order']);
		//});

		$( "#result" ).append( 'data' );

		$.post( "http://localhost:8000/hola", { name: "John", time: "2pm" })
		  .done(function( data ) {

		    $( "#result" ).append( data );
		    alert( "Data Loaded: " + data );
		  });

		 alert( 'Enviado');

    });



	 $("#insert-more").click(function () {
	     $("#myTable").each(function () {
	         var tds = '<tr>';
	         jQuery.each($('tr:last td', this), function () {
	             tds += '<td>' + $(this).html() + '</td>';
	         });

	         var td_new = '';
	         td_new = '<tr><td><input class="form-control" required="required" name="producto" type="text"></td><td><textarea class="form-control" cols="50" rows="2" name="descripcion"></textarea></td><td><input class="calculate form-control" required="required" name="cant" type="number"></td><td><input class="calculate form-control" required="required" name="precio" type="number"></td><td><input class="calculate form-control" required="required" name="impuesto" type="number"></td><td>0.00</td></tr>';

	         tds += '</tr>';
	         if ($('tbody', this).length > 0) {
	             $('tbody', this).append(td_new);
	         } else {
	             $(this).append(td_new);
	         }

	         mCalcular();

	     });



	});




</script>







@endsection
