@extends('app')

@section('content')

	@if(Auth::user()->canSeeIf(['crear-procedimientos-generales']))
	<a href="/procedimientos/administrativos/create" class="btn btn-lg btn-primary">Agregar Procedimiento</a>
	<hr>
	@endif
	<ul class="nav nav-tabs">
		<li class="{{request()->exists('inactivos') ? '' : 'active'}}">
			<a href="/procedimientos/administrativos/">Activos</a>
		</li>
		<li class="{{request()->exists('inactivos') ? 'active' : ''}}">
			<a href="?inactivos">Inactivos</a>
		</li>
	</ul>
	@if($admins->count()>0)
		<div class="table-responsive">

			<table class="table table-bordered">
				<thead>
				<th>Id</th>
				<th>Codigo</th>
				<th>Titulo</th>
				<th>Politicas</th>
				<th>Estado</th>
				@if(Auth::user()->canSeeIf(['editar-procedimientos-generales']))
					<th>Acciones</th>
				@endif
				</thead>
				<tbody>
				@foreach($admins as $admin)
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
						@if(Auth::user()->canSeeIf(['editar-procedimientos-generales']))
							<td>
								<div style="display: flex; justify-content: center;">
									<a href="/procedimientos/administrativos/{{$admin->code}}/edit"
									   class="fa fa-lg fa-pencil"
									   data-toggle="tooltip"
									   style="margin-right: 0.2em"
									   title="Editar!"></a>
									@if($admin->versionate()->count()>=1)
										@if($admin->id!=1)
											|
											<a href="/procedimientos/administrativos/{{$admin->id}}/versionamiento"
											   class="fa fa-lg fa-book"
											   data-toggle="tooltip"
											   style="margin-left: 0.2em"
											   title="Consultar Versiones"></a>
										@endif
									@endif
								</div>
							</td>
						@endif
					</tr>
				@endforeach
				</tbody>
			</table>

			{{$admins->links()}}
		</div>
	@else
		<div style="padding-top: 1em">
			<h2>No hay procedimientos adminsitrativos registrados.</h2>
		</div>
	@endif

@endsection

@section('scripts')
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
@endsection