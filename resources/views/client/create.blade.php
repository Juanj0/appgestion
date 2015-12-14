@extends('layouts.app')


@section('content')

@if (isset( $Client->id))
	<h1>Editando el Cliente: {!! $Client->nombre !!}</h1>
@else
	<h1>Nuevo Cliente</h1>
@endif

@if (isset( $Client->id))
	{!! Form::open(['route' => ['clientes.update', $Client], 'method' => 'PUT']) !!}
@else
	{!! Form::open(['route' => 'clientes.store', 'method' => 'POST']) !!}
@endif

    <div class="form-group">
		{!! Form::label('nombre', 'Nombre del Cliente'); !!}
		{!! Form::text('nombre', null,['class' => 'form-control', 'required']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('identificacion', 'RUC o Cedula'); !!}
		{!! Form::text('identificacion', null,['class' => 'form-control']);; !!}
    </div>

    <div class="form-group">
		{!! Form::label('direccion', 'Dirección'); !!}
		{!! Form::text('direccion', null,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('telefono', 'Teléfono'); !!}
		{!! Form::text('telefono', null,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('movil', 'Movil'); !!}
		{!! Form::text('movil', null,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('email', 'E-mail'); !!}
		{!! Form::text('email', null,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('web', 'Página Web'); !!}
		{!! Form::text('web', null,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		@if (isset( $Client->id))
			{!! Form::submit('Editar Cliente',['class' => 'btn btn-warning']); !!}
		@else
			{!! Form::submit('Crear Cliente',['class' => 'btn btn-warning']); !!}
		@endif
    </div>

{!! Form::close() !!}


@endsection
