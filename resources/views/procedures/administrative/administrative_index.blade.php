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
						<div class="acciones" >
							<a href="/procedimientos/administrativos/{{$admin->code}}/edit" data-toggle="tooltip" data-placement="top" title="Hooray!" class="btn btn-sm btn-primary">Editar</a>
							</div>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		{{$admins->links()}}
	</div>



@endsection
