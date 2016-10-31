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

		</div>
		<div class="col-md-6">

			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Procedimiento:</h3></div>
				<div class="panel-body">
					<ul class="list-group">
						<div class="lista-procedimientos">
							@if($administrativo->procedureFile()->count() > 0 )
								@foreach($administrativo->procedureFile()->get() as $file)

									<li id="file-procedimiento-{{$file->id}}" class="list-group-item list-group-item-info">

										<a  target="_blank" href="/archivos/procedimientos/administrativos/4/1/{{$file->originalName}}">
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

										<a  target="_blank" href="/archivos/procedimientos/administrativos/1/1/{{$file->originalName}}">
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

										<a target="_blank" href="/archivos/procedimientos/administrativos/2/1/{{$file->originalName}}">
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
			<hr>
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Archivos Anexos</h3></div>
				<div class="panel-body">
					<ul class="list-group">
						<div class="lista-anexos">
							@if($administrativo->annexedFiles()->count() > 0 )
								@foreach($administrativo->annexedFiles()->get() as $file)

									<li id="file-anexo-{{$file->id}}" class="list-group-item list-group-item-info">

										<a target="_blank" href="/archivos/procedimientos/administrativos/3/1/{{$file->originalName}}">
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
						</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		var listaArchivos= [];
		var listaFlujogramas= [];
		var listaAnexos= [];
		var listaProcedimientos= [];
		var url;
		var procedureId = '{{$administrativo->id}}';
		var radioValue;
		Dropzone.options.uploadFile= {
			maxFilesize: 2, // MB
			parallelUploads: 1,
			acceptedFiles: ".pdf,.docx",
			init: function(){
				this.on("addedfile", function() {
					radioValue =  $("input[name='type']:checked"). val();
					if(radioValue === undefined){
						swal("Error",'Debe Seleccionar un tipo de archivo',"error");
						this.removeAllFiles(true);
					};
					if(radioValue==1){
						url = "/archivos/procedimientos/formatos/"+procedureId+'/1';
					}
					if(radioValue==2){
						url = "/archivos/procedimientos/flujograma/"+procedureId;
					}
					if(radioValue==3){
						url = "/archivos/procedimientos/anexos/"+procedureId+'/1';
					}
					if(radioValue==4){
						url = "/archivos/procedimientos/procedimiento/"+procedureId+'/1';
					}
					$('#type_hidden').val(radioValue);
					// Create the remove button
				}).ontimeout;
				this.on("success", function(file, responseText){
					$.ajax({
						type:'GET',
						url:url,
						success: function(data){
						},
					})
					.done(function(data){
						var radioValue = $("input[name='type']:checked"). val();
						if(radioValue==1){
							listaArchivos=[];
							listaArchivos.push('<div class="lista-formatos">')
							$.each(data, function(i, item){
								listaArchivos.push('<li id="file-formato-'+item.id+'" class="list-group-item list-group-item-info">'+
										'<a target="_blank" href="/procedimiento/administrativos/1/1/'+item.originalName+'">'+
										item.title+'</a>'+
										'<i class="fa fa-times pull-right" onclick="deleteFile(\''+
										item.originalName+'\',\'{{$administrativo->id}}\',\''+item.id+'\''+
										',\'formato\',\'/procedimiento/archivos/formato/\')"></i></li>')
							});
							listaArchivos.push('</div>')

							$('div.lista-formatos').replaceWith(listaArchivos.join(''));
							swal("Agregado",'El formato fue agregado con exito',"success");
						}
						if(radioValue==2){
							listaFlujogramas=[];
							listaFlujogramas.pop();
							listaFlujogramas.push('<div class="lista-flujogramas">')
							$.each(data, function(i, item){
								listaFlujogramas.push('' +
										'<li id="file-flujograma-'+item.id+'" class="list-group-item list-group-item-info">'+
										'<a target="_blank" href="/procedimiento/administrativos/2/1/'+item.originalName+'">'+
										item.title+'</a>'+
										'<i class="fa fa-times pull-right" onclick="deleteFile(\''+
										item.originalName+'\',\'{{$administrativo->id}}\',\''+item.id+'\''+
										',\'flujograma\',\'/procedimiento/archivos/flujograma/\')"></i></li>')
							});
							listaFlujogramas.push('</div>')

							$('div.lista-flujogramas').replaceWith(listaFlujogramas.join(''));
							swal("Agregado",'El Flujograma fue agregado con exito',"success");
						}
						if(radioValue==3){
							listaAnexos=[];
							listaAnexos.push('<div class="lista-anexos">')
							$.each(data, function(i, item){
								listaAnexos.push(
									'<li id="file-anexo-'+item.id+'" ' +
										'class="list-group-item list-group-item-info">'+
									'<a target="_blank" href="/procedimiento/administrativos/3/1/' +item.originalName+ '">'
										+item.title+
									'</a>'+
										'<i class="fa fa-times pull-right" ' +
											'onclick="deleteFile(\'' +item.originalName+ '\',\'{{$administrativo->id}}\',\'' +item.id+ '\''+
										',\'anexo\',\'/procedimiento/archivos/anexo/\')">' +
										'</i>' +
									'</li>')
							});
							listaAnexos.push('</div>')

							$('div.lista-anexos').replaceWith(listaAnexos.join(''));
							swal("Agregado",'El Anexo fue agregado con exito',"success");
						}
						if(radioValue==4){
							listaProcedimientos=[];
							listaProcedimientos.push('<div class="lista-procedimientos">')
							$.each(data, function(i, item){
								listaProcedimientos.push(
									'<li id="file-procedimiento-'+item.id+'" ' +
										'class="list-group-item list-group-item-info">'+
									'<a target="_blank" href="/procedimiento/administrativos/4/1/' +item.originalName+ '">'
										+item.title+
									'</a>'+
										'<i class="fa fa-times pull-right" ' +
											'onclick="deleteFile(\'' +item.originalName+ '\',\'{{$administrativo->id}}\',\'' +item.id+ '\''+
										',\'procedimiento\',\'/procedimiento/archivos/procedimiento/\')">' +
										'</i>' +
									'</li>')
							});
							listaProcedimientos.push('</div>')

							$('div.lista-procedimientos').replaceWith(listaProcedimientos.join(''));
							swal("Agregado",'El Documento del Procedimiento fue agregado con exito',"success");
						}


					})
					.error(function(data){
						console.log(data);
						swal("Error",data.responseText,"error");
					});
					var self = this;
					setTimeout(function(){
						self.removeFile(file);
					},3500);
				});
			}
		}



	</script>
	<script>
		function deleteFile(nameFile,idProcedure,idAnnexedFile,tipo, url){
			var csrf = $("meta[name='csrf_token']").attr('content');

			swal({
						title: "¿Esta seguro de eliminar "+nameFile+"?",
						text: "Esta accion no puede ser revertida",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#3c3cf2",
						confirmButtonText: "Eliminar",
						cancelButtonText: "Cancelar",
						closeOnConfirm:false,
						closeOnCancel:false,
					},
					function(isConfirm){
						if (isConfirm) {
							$.ajax({
									type:'DELETE',
									url:url+idProcedure+'/'+idAnnexedFile+'/1',
									headers: {
										'X-CSRF-Token': csrf,
									},
									success: function(data){

									},
								})
								.done(function(data){
									$('#file-'+''+tipo+'-'+idAnnexedFile).fadeOut();
									swal("Eliminado",data,"success");
								})
								.error(function(data){
									swal("Error",data.responseText,"error");
								});
						}else {
							swal("Cancelado","El registro no ha sido modificado.","error");
						}
					});
		}
	</script>
@endsection

