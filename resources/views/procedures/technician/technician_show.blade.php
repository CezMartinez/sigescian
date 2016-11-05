@extends('app')

@section('content')
	{!! link_to(url('/procedimientos/tecnicos'), '  Atras', ['class' => 'fa fa-2x fa-arrow-circle-left']) !!}

	<hr>

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3> {{$tecnico->name}} </h3></div>
				<div class="panel-body">
					<p>Codigo: {{$tecnico->code}}</p>
					<p>Estado: {{$tecnico->status}}</p>
					<p>Seccion: {{$tecnico->section->section}}</p>
					@if($tecnico->subSections()->count() > 0)
					<p>Subsecciones: </p>
						<ul>
							@foreach($tecnico->subSections as $subsection)
									<li>{{$subsection->section}}</li>
							@endforeach
						</ul>
					@endif
					<p>Instrucciones Tecnicas</p>
					<ol>
						@foreach($tecnico->steps()->get() as $step)
							<li>{{$step->step}}</li>
						@endforeach
					</ol>
				</div>
			</div>
			<hr>
			<h2>Seleccione el tipo de archivo que desea subir al sistema:</h2>
			<div>
				<input type="radio" name="type" value="4" class="type">
				<label for="type">Documento del Procedimiento</label>
				<input type="radio" name="type" value="1" class="type">
				<label for="type">Formatos </label>
				<input type="radio" name="type" value="3" class="type">
				<label for="type"> Anexos</label>
			</div>
			<form action="/procedimiento/tecnico/{{$tecnico->id}}/archivos-adjuntos" id="uploadFile" method="POST"
				  class="dropzone"
				  id="annexed-files">
				<input type="hidden" name="type" id="type_hidden">
				<input type="hidden" name="procedure" value="2">
				{{csrf_field()}}
			</form>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default" style="height: 475px;overflow-y: scroll;">
				<div class="panel-body">
					<h4>Lista de instrucciones tecnicas</h4>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<ol id="pasos">

							</ol>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
						</div>
						<div class="col-md-4">
							<a class="btn btn-md btn-success" onclick="agregar()"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
						</div>
						<div class="col-md-4">
							<a class="btn btn-md btn-info" onclick="enviar({{$tecnico->id}})"><span class="glyphicon glyphicon-save"></span> Guardar</a>
						</div>
						<div class="col-md-2">
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<hr/>
	<div class="row">
        <div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Formatos</h3></div>
				<div class="panel-body">
					<ul class="list-group">
						<div class="lista-formatos">
								@foreach($tecnico->formatFiles()->get() as $file)

								<li id="file-formato-{{$file->id}}" class="list-group-item list-group-item-info">

									<a target="_blank" href="/archivos/procedimientos/1/2/{{$file->originalName}}">
										{{$file->title}}
									</a>

									<i class="fa fa-times pull-right"
									   onclick="deleteFile(
											   '{{$file->originalName}}',
											   '{{$tecnico->id}}',
											   '{{$file->id}}',
											   'formato',
											   '/procedimiento/archivos/formato/')"></i>
								</li>
							@endforeach
						</div>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Archivos Anexos</h3></div>
				<div class="panel-body">
					<ul class="list-group">
						<div class="lista-anexos">
							@foreach($tecnico->annexedFiles()->get() as $file)

							<li id="file-anexo-{{$file->id}}" class="list-group-item list-group-item-info">

								<a target="_blank" href="/archivos/procedimientos/3/2/{{$file->originalName}}">
									{{$file->title}}
								</a>

								<i class="fa fa-times pull-right"
								   onclick="deleteFile(
										   '{{$file->originalName}}',
										   '{{$tecnico->id}}',
										   '{{$file->id}}',
										   'anexo',
										   '/procedimiento/archivos/anexo/')"></i>
								</li>
							@endforeach
						</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <br>
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>Procedimiento:</h3></div>
            <div class="panel-body">
                <ul class="list-group">
                    <div class="lista-procedimientos">
                        @if($tecnico->procedureDocument()->count() > 0 )
                            @foreach($tecnico->procedureDocument()->get() as $file)

                                <li id="file-procedimiento-{{$file->id}}" class="list-group-item list-group-item-info">

                                    <a  target="_blank" href="/archivos/procedimientos/4/2/{{$file->originalName}}">
                                        {{$file->title}}
                                    </a>

                                    <i class="fa fa-times pull-right"
                                       onclick="deleteFile(
                                               '{{$file->originalName}}',
                                               '{{$tecnico->id}}',
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
    </div>


@endsection

@section('scripts')
	<script !src="">
		$(document).ready(
			bringStepsOfProcedure(id_tecnico)
		);
		var listaInstrucciones = [];
		var num = 1;
		var texto = "kamsd aksdmaksd"
		function bringStepsOfProcedure(id_procedure){
			$.ajax({
						type:'GET',
						url:"/procedimiento/instrucciones/"+id_procedure,
						success: function(data){
							$.each(data, function(i, item){
								num = num + 1
								$('#pasos').append('<li class="esk">'+
									'<div class="input-group">'+
									'<input placeholder="Descripcion del paso" id='+item.id+' name="step[]" value="'+item.step+'" class="form-control step"/>'+
									'<span class="input-group-btn step'+num+'"><a class="btn btn-danger" onclick="eliminar('+num+')" >'+
									'<span class="glyphicon glyphicon-remove"></span>Eliminar</a></span>'+
									'</div></li>')
							});
						},
					})
		}
	</script>
	<script src="/js/technician.js"></script>
@endsection

