

@if (isset( $Details->id))
	<tr  id='tr_{!! $Details->id !!}' data-id='{!! $Details->id !!}' >
	{!! Form::open(['route' => ['detalles.update', $Details], 'method' => 'PUT', 'id' => 'form_'.$Details->id]]) !!}
@else
	<tr data-id='0' >
	{!! Form::open(['route' => 'detalles.store', 'method' => 'POST', 'id' => 'form_item']) !!}
@endif

	<td>{!! Form::text('producto', @$Details->producto,['class' => 'form-control', 'required']); !!}</td>
	<td>{!! Form::textarea('descripcion', @$Details->descripcion,['class' => 'form-control', 'cols'=>'50' , 'rows'=>'2']); !!}</td>
	<td>{!! Form::number('cant', @$Details->cant,['class' => 'calculate form-control', 'required']); !!}</td>
	<td>{!! Form::number('precio', @$Details->precio,['class' => 'calculate form-control', 'required']); !!}</td>
	<td>{!! Form::number('impuesto', @$Details->impuesto,['class' => 'calculate form-control', 'required']); !!}</td>
	<td>{!! Form::number('total', @$Details->total,['class' => 'calculate form-control', 'required','readonly']); !!}</td>

@if (isset( $Details->id))
	<td>{!! Form::submit('Editar',['class' => 'saveItem btn btn-xs btn-warning']); !!}</td>
@else
	<td>{!! Form::submit('Guardar',['class' => 'saveItem btn btn-xs btn-warning']); !!}</td>
@endif
	
{!! Form::close() !!}

</tr>