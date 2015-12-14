
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Detalle del Cliente</h4>
</div>


@if (isset( $Invoice->id))
	{!! Form::open(['route' => ['facturas.update', $Invoice], 'method' => 'PUT']) !!}
@else
	{!! Form::open(['route' => 'facturas.store', 'method' => 'POST']) !!}
@endif

<div class="modal-body">

    <div class="form-group">
		{!! Form::label('client_id', 'Nombre del Cliente'); !!}
		{!! Form::select('client_id', $Clients, null, ['class' => 'chosen-select form-control', 'placeholder' => 'Seleccione']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('numero', 'Número'); !!}
		{!! Form::text('numero', @$mNumero,['class' => 'form-control', 'required']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('fecha', 'Fecha'); !!}
		{!! Form::date('fecha', null,['class' => 'form-control']);; !!}
    </div>

</div>

<div class="modal-footer">
	{!! Form::submit('Crear Factura',['class' => 'btn btn-info']); !!}
	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>

{!! Form::close() !!}

<script>
  $(".chosen-select").select2();
</script>