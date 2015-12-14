

@if (isset( $Details->id))
	<tr  id='tr_{!! $Details->id !!}' data-id='{!! $Details->id !!}' >
	{!! Form::open(['route' => ['detalles.update', $Details], 'method' => 'PUT', 'id' => 'form_'.$Details->id]) !!}
@else
	<tr data-id='0' >
	{!! Form::open(['route' => 'detalles.store', 'method' => 'POST', 'id' => 'form_item']) !!}
@endif

	<td>
		{!! Form::hidden('invoice_id', @$Details->invoice_id,['class' => 'form-control']); !!}
		{!! Form::text('producto', @$Details->producto,['class' => 'form-control', 'required']); !!}
	</td>
	<td>{!! Form::textarea('descripcion', @$Details->descripcion,['class' => 'form-control', 'cols'=>'50' , 'rows'=>'1']); !!}</td>
	<td>{!! Form::number('cant', @$Details->cant,['class' => 'calculate a_derecha form-control', 'required']); !!}</td>
	<td>{!! Form::number('precio', @$Details->precio,['class' => 'calculate a_derecha form-control', 'required']); !!}</td>
	<td>{!! Form::number('impuesto', @$Details->impuesto,['class' => 'calculate a_derecha form-control', 'required']); !!}</td>
	<td>{!! Form::number('total', @$Details->total,['class' => 'calculate a_derecha form-control', 'required','readonly']); !!}
	</td>

@if (isset( $Details->id))
	<td><button type="submit" class="saveItem btn btn-xs btn-info"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>

				 <button type="button" 
				 data-id="{{ $Details->id }}" 
				 data-nombre="{{ $Details->producto }}" 
				 data-destroy_route="{{ route('detalles.destroy', $Details->id) }}"
				 class="btn  btn-xs btn-danger" data-toggle="modal" data-target="#confirmDelete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
		<div id="loading_{!! $Details->id !!}"></div></td>
@else
	<td><button type="submit" class="saveItem btn btn-xs btn-info"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button><div id="loading_{!! $Details->id !!}"></div></td>
@endif
	
{!! Form::close() !!}

</tr>