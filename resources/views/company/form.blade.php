@extends('layouts.app')


@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
					@if (isset( $data->id))
						Empresa: {!! $data->nombre !!}
					@else
						Nueva Empresa
					@endif
                </div>
 
                <div class="panel-body">
					@if (isset( $data->id))
						{!! Form::open(['route' => ['empresas.update', $data], 'method' => 'PUT']) !!}
					@else
						{!! Form::open(['route' => 'empresas.store', 'method' => 'POST']) !!}
					@endif

					    <div class="form-group">
							{!! Form::label('nombre', 'Nombre del Cliente'); !!}
							{!! Form::text('nombre', @$data->nombre,['class' => 'form-control', 'required']); !!}
					    </div>

					    <div class="form-group">
							{!! Form::label('identificacion', 'RUC o Cedula'); !!}
							{!! Form::text('identificacion', @$data->identificacion,['class' => 'form-control']);; !!}
					    </div>

					    <div class="form-group">
							{!! Form::label('direccion', 'Dirección'); !!}
							{!! Form::text('direccion', @$data->direccion,['class' => 'form-control']); !!}
					    </div>

					    <div class="form-group">
							{!! Form::label('telefono', 'Teléfono'); !!}
							{!! Form::text('telefono', @$data->telefono,['class' => 'form-control']); !!}
					    </div>

					    <div class="form-group">
							{!! Form::label('movil', 'Movil'); !!}
							{!! Form::text('movil', @$data->movil,['class' => 'form-control']); !!}
					    </div>

					    <div class="form-group">
							{!! Form::label('email', 'E-mail'); !!}
							{!! Form::text('email', @$data->email,['class' => 'form-control']); !!}
					    </div>

					    <div class="form-group">
							{!! Form::label('web', 'Página Web'); !!}
							{!! Form::text('web', @$data->web,['class' => 'form-control']); !!}
					    </div>

					    <div class="form-group">
							@if (isset( $data->id))
								{!! Form::submit('Editar Empresa',['class' => 'btn btn-warning']); !!}
							@else
								{!! Form::submit('Crear Empresa',['class' => 'btn btn-warning']); !!}
							@endif
					    </div>

					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
