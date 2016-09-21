@extends('app')

@section('content')

	<a href="/procedimientos/administrativos/create" class="btn btn-primary">Agregar Procedimiento</a>

	<hr>
	<div class="table-responsive">

		<table class="table table-bordered">
			<thead>
			<th>Codigo</th>
			<th>Titulo</th>
			<th>Estado</th>
			<th>Descripción</th>
			<th>Politicas</th>
			<th>Acciones</th>
			</thead>
			<tbody>
			@foreach($admins as $admin)
				<tr id="row-{{$admin->id}}" class="{{($admin->state) ? '':'info'}}">
					<td>
						{{$admin->code}}
					</td>
					<td>
						{{$admin->name}}
					</td>
					<td>
						{{$admin->status}}
					</td>
					<td>
						{{$admin->description}}
					</td>
					<td>
						{{$admin->politic}}
					</td>
					<td>
						<div class="acciones" >
							<a href="/procedimientos/administrativos/{{$admin->code}}/edit" class="fa fa-lg fa-pencil" data-toggle="tooltip" title="Editar!"></a>
							</div>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		{{$admins->links()}}
	</div>



@endsection
