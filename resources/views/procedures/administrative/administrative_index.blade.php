@extends('app')

@section('content')

	<a href="/procedimientos/administrativos/create" class="btn btn-lg btn-primary">Agregar Procedimiento</a>

	<hr>
	@if($admins->count()>0)
		<div class="table-responsive">

			<table class="table table-bordered">
				<thead>
				<th>Codigo</th>
				<th>Titulo</th>
				<th>Politicas</th>
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
							{{$admin->politic}}
						</td>
						<td>
							{{$admin->status}}
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
	@else
		<h2>No hay procedimientos adminsitrativos registrados.</h2>
	@endif



@endsection
