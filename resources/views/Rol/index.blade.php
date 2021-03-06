@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Roles <a href="Rol/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('Rol.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripción</th>
				
				</thead>
               @foreach ($Rol as $rol)
				<tr>
					<td>{{ $rol->id}}</td>
					<td>{{ $rol->descripcion}}</td>
					<td>
						<a href="{{URL::action('RolController@edit',$rol->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$rol->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('Rol.modal')
				@endforeach
			</table>
		</div>
		{{$Rol->render()}}
	</div>
</div>

@endsection