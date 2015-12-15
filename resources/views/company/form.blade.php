@extends('layouts.theme')


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


<!-- Form page -->
							<div class="page-form">
								<!-- Form Content -->

                              
						@if (isset( $data->id))
							{!! Form::open(['route' => ['empresas.update', $data], 'method' => 'PUT','class' => 'form-horizontal', 'role' => 'form', 'files'=>true]) !!}
						@else
							{!! Form::open(['route' => 'empresas.store', 'method' => 'POST','class' => 'form-horizontal', 'role' => 'form', 'files'=>true]) !!}
						@endif




						<div class="form-group">
							{!! Form::label('nombre', 'Nombre del Cliente',['class' => 'col-lg-4 control-label']); !!}
							<div class="col-lg-8">
								{!! Form::text('nombre', @$data->nombre,['class' => 'form-control', 'required']); !!}
							</div>
						</div>
                    

						<div class="form-group">
							{!! Form::label('identificacion', 'RUC o Cedula',['class' => 'col-lg-4 control-label']); !!}
							<div class="col-lg-8">
								{!! Form::text('identificacion', @$data->identificacion,['class' => 'form-control']);; !!}
							</div>
						</div>




						<div class="form-group">
							{!! Form::label('direccion', 'Dirección',['class' => 'col-lg-4 control-label']); !!}
							<div class="col-lg-8">
								{!! Form::text('direccion', @$data->direccion,['class' => 'form-control']); !!}
							</div>
						</div>



						<div class="form-group">
							{!! Form::label('telefono', 'Teléfono',['class' => 'col-lg-4 control-label']); !!}
							<div class="col-lg-8">
								{!! Form::text('telefono', @$data->telefono,['class' => 'form-control']); !!}
							</div>
						</div>



						<div class="form-group">
							{!! Form::label('movil', 'Movil',['class' => 'col-lg-4 control-label']); !!}
							<div class="col-lg-8">
								{!! Form::text('movil', @$data->movil,['class' => 'form-control']); !!}
							</div>
						</div>



						<div class="form-group">
							{!! Form::label('email', 'E-mail',['class' => 'col-lg-4 control-label']); !!}
							<div class="col-lg-8">
								{!! Form::text('email', @$data->email,['class' => 'form-control']); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('web', 'Página Web',['class' => 'col-lg-4 control-label']); !!}
							<div class="col-lg-8">
								{!! Form::text('web', @$data->web,['class' => 'form-control']); !!}
							</div>
						</div>



						<div class="form-group">
							
							{!! Form::label('logo', 'Logo',['class' => 'col-lg-4 control-label']); !!}
							<div class="col-lg-8">
								@if (isset($data->logo))
									@if (empty($data->logo))
										{!! Form::file('logo'); !!}
									@else
										<a href="{!! '/assets/img/' . $data->logo !!}" class="prettyphoto">	<img src="{!! '/assets/img/' . $data->logo !!}" class="img-responsive" alt=""/></a>
									@endif
								@else
									{!! Form::file('logo'); !!}
								@endif
								

							
							</div>
						</div>



						<div class="media-body">
							<div class="form-group pull-right">
								<div class="col-lg-12 " >
									@if (isset( $data->id))
									{!! Form::submit('Editar Empresa',['class' => 'btn btn-warning']); !!}
									@else
									{!! Form::submit('Crear Empresa',['class' => 'btn btn-warning']); !!}
									@endif
								</div>					    
							</div>
						</div>

						{!! Form::close() !!}

							</div> <!-- Form page end -->





                </div>
            </div>
        </div>
    </div>






</div>
@endsection




@section('script')

        <script type="text/javascript">
				
			/* PrettyPhoto for Gallery */
			/* ----------------------- */

			$(".prettyphoto").prettyPhoto({
			   overlay_gallery: false, social_tools: false
			});
		</script>

@endsection


