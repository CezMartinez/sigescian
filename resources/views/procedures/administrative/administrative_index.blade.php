@extends('app')

@section('content')

	<a href="/procedimientos/administrativos/create" class="btn btn-primary">Agregar Procedimiento</a>

	<hr>
	<div class="table-responsive">

		<table class="table table-hover table-bordered">
			<thead>
			<th>Codigo</th>
			<th>Titulo</th>
			<th>Acciones</th>
			</thead>
			<tbody>
			@foreach($admins as $admin)
				<tr id="row-{{$admin->id}}">
					<td>
						{{$admin->code}}
					</td>
					<td>
						{{$admin->name}}
					</td>
					<td>
						<div class="acciones" >
							<a href="/procedimientos/administrativos/{{$admin->code}}/edit" class="btn btn-sm btn-success">Editar</a> |
							<a class="btn btn-sm btn-danger"
							   onclick="deleteConfirm('{{$admin->code}}','{{$admin->name}}','/procedimientos/administrativos/')">Eliminar</a>
						</div>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		{{$admins->links()}}
	</div>



@endsection