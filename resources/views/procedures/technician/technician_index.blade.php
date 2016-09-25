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
				<th>Laboratorio</th>
				<th>Estado</th>
				<th>Acciones</th>
				</thead>
				<tbody>
				@foreach($techs as $t)
					<tr id="row-{{$t->id}}" class="{{($t->state) ? '':'info'}}">
						<td>
							{{$t->id}}
						</td>
						<td>
							<a href="/procedimientos/tecnicos/{{$t->id}}">{{$t->code}}</a>
						</td>
						<td>
							{{$t->name}}
						</td>
						<td>
							{{$t->laboratory_id}}
						</td>
						<td>
							{{$t->status}}
						</td>
						<td>
							<div class="acciones" >
								<a href="/procedimientos/tecnicos/{{$t->code}}/edit" class="fa fa-lg fa-pencil" data-toggle="tooltip" title="Editar!"></a>
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
