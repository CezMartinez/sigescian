@extends('app')

@section('content')

	@if(Auth::user()->canSeeIf(['crear-procedimientos-tecnicos']))
		<a href="/procedimientos/tecnicos/create" class="btn btn-lg btn-primary">Agregar Procedimiento</a>
	@endif

	<hr>
	<ul class="nav nav-tabs">
		<li class="{{request()->exists('inactivos') ? '' : 'active'}}">
			<a href="/procedimientos/tecnicos/">Activos</a>
		</li>
		<li class="{{request()->exists('inactivos') ? 'active' : ''}}">
			<a href="?inactivos">Inactivos</a>
		</li>
	</ul>
	@if($techs->count()>0)
		<div class="table-responsive">

			<table class="table table-bordered">
				<thead>
				<th>Id</th>
				<th>Codigo</th>
				<th>Titulo</th>
				<th>Laboratorio</th>
				<th>Estado</th>
				@if(Auth::user()->canSeeIf(['editar-procedimientos-tecnicos']))
					<th>Acciones</th>
				@endif
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
						@if(Auth::user()->canSeeIf(['editar-procedimientos-tecnicos']))
							<td>
								<ul class="list-inline" >
									<a href="/procedimientos/tecnicos/{{$t->code}}/edit" class="fa fa-lg fa-pencil" data-toggle="tooltip" title="Editar!"></a>
								</ul>
							</td>
						@endif
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
