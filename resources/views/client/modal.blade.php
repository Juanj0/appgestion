

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Detalle del Cliente</h4>
</div>

<div class="modal-body">


    <div class="form-group">
		Nombre del Cliente: 
		{!! Form::label(@$Client->nombre); !!}
    </div>

    <div class="form-group">
		RUC o Cedula:
		{!! Form::label(@$Client->identificacion);; !!}
    </div>

    <div class="form-group">
		Dirección:
		{!! Form::label(@$Client->direccion); !!}
    </div>

    <div class="form-group">
		Teléfono:
		{!! Form::label(@$Client->telefono); !!}
    </div>

    <div class="form-group">
		Movil:
		{!! Form::label(@$Client->movil); !!}
    </div>

    <div class="form-group">
		E-mail:
		{!! Form::label(@$Client->email); !!}
    </div>

    <div class="form-group">
		Página Web:
		{!! Form::label(@$Client->web); !!}
    </div>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>