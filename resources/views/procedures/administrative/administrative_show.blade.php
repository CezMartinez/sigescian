@extends('app')

@section('content')

    {!! link_to(url('/procedimientos/administrativos'), '  Atras', ['class' => 'fa fa-2x fa-arrow-circle-left']) !!}

    <hr>
	
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3> {{$administrativo->name}} </h3></div>
				<div class="panel-body">
					<p><strong>Codigo: </strong>{{$administrativo->code}}</p>
					<p><strong>Estado: </strong>{{$administrativo->status}}</p>
					<p><strong>Seccion: </strong>{{$administrativo->section->section}}</p>
					@if($administrativo->subSections()->count() > 0)
					<p><strong>Subsecciones: </strong></p>
						<ul>
							@foreach($administrativo->subSections as $subsection)
									<li>{{$subsection->section}}</li>
							@endforeach
						</ul>
					@endif

				</div>
			</div>
			<hr>
			<h2>Seleccione el tipo de archivo que desea subir al sistema:</h2>
			<div>
				<input type="radio" name="type" value="4" class="type">
				<label for="type">Documento del Procedimiento</label>
				<input type="radio" name="type" value="1" class="type">
				<label for="type">Formatos </label>
				<input type="radio" name="type" value="2" class="type">
				<label for="type">Flujogramas</label>
				<input type="radio" name="type" value="3" class="type">
				<label for="type">Anexos</label>
			</div>

			<form action="/procedimiento/administrativo/{{$administrativo->id}}/archivos-adjuntos" id="uploadFile" method="POST"
				  class="dropzone"
				  id="annexed-files">
				<input type="hidden" name="type" id="type_hidden">
				<input type="hidden" name="procedure" value="1">
				{{csrf_field()}}
			</form>

			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Archivos Anexos</h3></div>
				<div class="panel-body">
					<ul class="list-group">
						<div class="lista-anexos">
							@if($administrativo->annexedFiles()->count() > 0 )
								@foreach($administrativo->annexedFiles()->get() as $file)

									<li id="file-anexo-{{$file->id}}" class="list-group-item list-group-item-info">

										<a target="_blank" href="/archivos/procedimientos/3/1/{{$file->originalName}}">
											{{$file->title}}
										</a>

										<i class="fa fa-times pull-right"
										   onclick="deleteFile(
												   '{{$file->originalName}}',
												   '{{$administrativo->id}}',
												   '{{$file->id}}',
												   'anexo',
												   '/procedimiento/archivos/anexo/')"></i>
									</li>
								@endforeach
							@else
								No hay archivos anexos con este procedimiento
							@endif
							<div class="form-group">
								<hr>
								<select name="procedimiento" id="procedimientos" class="form-control">
									<option value="1">Procedimiento Comunicacion Interna</option>
									<option value="1">Procedimiento Comunicacion externa</option>
								</select>
								<hr>
								<select name="procedimiento" class="formatos form-control" multiple>
									<option value="1">Formato tal</option>
									<option value="1">Formato tal 2</option>
								</select>
								<hr>
								<Button class="form-control btn-primary btn" >Asociar</Button>
							</div>
						</div>
					</ul>
				</div>
			</div>
			<hr>
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Flujograma:</h3></div>
				<div class="panel-body">
					<ul class="list-group">
						<div class="lista-flujogramas">
							@if($administrativo->flowChartFile()->count() > 0 )
								@foreach($administrativo->flowChartFile()->get() as $file)

									<li id="file-flujograma-{{$file->id}}" class="list-group-item list-group-item-info">

										<a target="_blank" href="/archivos/procedimientos/2/1/{{$file->originalName}}">
											{{$file->title}}
										</a>

										<i class="fa fa-times pull-right"
										   onclick="deleteFile(
												   '{{$file->originalName}}',
												   '{{$administrativo->id}}',
												   '{{$file->id}}',
												   'flujograma',
												   '/procedimiento/archivos/flujograma/')"></i>
									</li>
								@endforeach
							@else
								No ha asociado un flujograma con este procedimiento
							@endif
						</div>
					</ul>

				</div>
			</div>


		</div>
		<div class="col-md-6">

			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Procedimiento:</h3></div>
				<div class="panel-body">
					<ul class="list-group">
						<div class="lista-procedimientos">
							@if($administrativo->procedureDocument()->count() > 0 )
								@foreach($administrativo->procedureDocument()->get() as $file)

									<li id="file-procedimiento-{{$file->id}}" class="list-group-item list-group-item-info">

										<a  target="_blank" href="/archivos/procedimientos/4/1/{{$file->originalName}}">
											{{$file->title}}
										</a>

										<i class="fa fa-times pull-right"
										   onclick="deleteFile(
												   '{{$file->originalName}}',
												   '{{$administrativo->id}}',
												   '{{$file->id}}',
												   'procedimiento',
												   '/procedimiento/archivos/procedimiento/')"></i>
									</li>
								@endforeach
							@else
								<p>No hay un documento oficial asociado con este procedimiento</p>
							@endif
						</div>
					</ul>
				</div>
			</div>
			<hr>
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Formatos:</h3></div>
				<div class="panel-body">
					<ul class="list-group">
						<div class="lista-formatos">
							@if($administrativo->formatFiles()->count() > 0 )
								@foreach($administrativo->formatFiles()->get() as $file)

									<li id="file-formato-{{$file->id}}" class="list-group-item list-group-item-info">

										<a  target="_blank" href="/archivos/procedimientos/1/1/{{$file->originalName}}">
											{{$file->title}}
										</a>

										<i class="fa fa-times pull-right"
										   onclick="deleteFile(
												   '{{$file->originalName}}',
												   '{{$administrativo->id}}',
												   '{{$file->id}}',
												   'formato',
												   '/procedimiento/archivos/formato/')"></i>
									</li>
								@endforeach
							@else
								No hay formatos asociados con este procedimiento
							@endif
						</div>
					</ul>
					<div class="form-group">
						<hr>
						<select name="procedimiento" id="procedimientos" class="form-control">
							<option value="1">Procedimiento Comunicacion Interna</option>
							<option value="1">Procedimiento Comunicacion externa</option>
						</select>
						<hr>
						<select name="procedimiento" class="formatos form-control" multiple>
							<option value="1">Formato tal</option>
							<option value="1">Formato tal 2</option>
						</select>
						<hr>
						<Button class="form-control btn-primary btn" >Asociar</Button>
					</div>
				</div>
			</div>
			<hr>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="/js/administrative.js"></script>
	<script>
		$('#procedimientos').select2({
			placeholder: "Seleccione los roles a asignar"
		});
		$('.formatos').select2({
			placeholder: "Seleccione los roles a asignar"
		});
	</script>

@endsection

