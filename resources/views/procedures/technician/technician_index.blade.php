@extends('app')

@section('content')

	<a href="/procedimientos/tecnicos/create" class="btn btn-lg btn-primary">Agregar Procedimiento</a>

	<hr>
	@if($techs->count()>0)
		<div class="table-responsive">

			<table class="table table-bordered">
				<thead>
				<th>Id</th>
				<th>Codigo</th>
				<th>Titulo</th>
				<th>Politicas</th>
				<th>Estado</th>
				<th>Acciones</th>
				</thead>
				<tbody>
				@foreach($techs as $admin)
					<tr id="row-{{$admin->id}}" class="{{($admin->state) ? '':'info'}}">
						<td>
							{{$admin->id}}
						</td>
						<td>
							<a href="/procedimientos/administrativos/{{$admin->id}}">{{$admin->code}}</a>
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
								<a href="/procedimientos/tecnicos/{{$admin->code}}/edit" class="fa fa-lg fa-pencil" data-toggle="tooltip" title="Editar!"></a>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

			{{$techs->links()}}
		</div>
	@else
		<h2>No hay procedimientos técnicos registrados.</h2>
	@endif



@endsection
