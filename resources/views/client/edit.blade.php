@extends('layouts.theme')

@section('content')

@if (isset( $Client->id))
Hola
@else
Chao
@endif

Editando el Cliente: {!! $Client->nombre !!}

{!! Form::open(['route' => ['clientes.update', $Client], 'method' => 'PUT']) !!}

    <div class="form-group">
		{!! Form::label('nombre', 'Nombre del Cliente'); !!}
		{!! Form::text('nombre', $Client->nombre,['class' => 'form-control', 'required']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('identificacion', 'RUC o Cedula'); !!}
		{!! Form::text('identificacion', $Client->identificacion,['class' => 'form-control']);; !!}
    </div>

    <div class="form-group">
		{!! Form::label('direccion', 'Dirección'); !!}
		{!! Form::text('direccion', $Client->direccion,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('telefono', 'Teléfono'); !!}
		{!! Form::text('telefono', $Client->telefono,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('movil', 'Movil'); !!}
		{!! Form::text('movil', $Client->movil,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('email', 'E-mail'); !!}
		{!! Form::text('email', $Client->email,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		{!! Form::label('web', 'Página Web'); !!}
		{!! Form::text('web', $Client->web,['class' => 'form-control']); !!}
    </div>

    <div class="form-group">
		{!! Form::submit('Editar',['class' => 'btn btn-warning']); !!}
    </div>

{!! Form::close() !!}


@endsection