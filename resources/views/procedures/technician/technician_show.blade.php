@extends('app')

@section('content')


	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3> {{$tecnico->name}} </h3></div>
				<div class="panel-body">
					<p>Codigo: {{$tecnico->code}}</p>
					<p>Estado: {{$tecnico->status}}</p>
					<p>Seccion: {{$tecnico->section->section}}</p>
					@if($subsections->count() > 0)
					<p>Subsecciones: </p>
						<ul>
							@foreach($subsections as $subsection)
									<li>{{$subsection->section}}</li>
							@endforeach
						</ul>
					@endif

				</div>
			</div>
			<hr>
			<h2>Seleccione el tipo de archivo que desea subir al sistema:</h2>
			<div>
				<input type="radio" name="type" value="1" class="type">
				<label for="type">Formatos </label>
				<input type="radio" name="type" value="3" class="type">
				<label for="type"> Anexos</label>
			</div>
			<form action="/procedimiento/tecnico/{{$tecnico->id}}/archivos-adjuntos" id="uploadFile" method="POST"
				  class="dropzone"
				  id="annexed-files">
				<input type="hidden" name="type" id="type_hidden">
				{{csrf_field()}}
			</form>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default" style="height: 475px;overflow-y: scroll;">
				<div class="panel-body">
					<h4>Lista de pasos</h4>
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
							<a class="btn btn-md btn-info" onclick="enviar({{$tecnico->id}})"><span class="glyphicon glyphicon-plus"></span> Enviar</a>
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
		var url;
		var procedureId = '{{$tecnico->id}}';
		var radioValue;
		Dropzone.options.uploadFile= {
			maxFilesize: 20, // MB
			acceptedFiles: ".pdf,.docx",
			init: function(){
				this.on("addedfile", function() {
					radioValue =  $("input[name='type']:checked"). val();
					if(radioValue === undefined){
						swal("Error",'Debe Seleccionar un tipo de archivo',"error");
						this.removeAllFiles(true);
					};
					if(radioValue==1){
						url = "/archivos/procedimientos/tecnicos/formatos/"+procedureId;
					}
					if(radioValue==2){
						url = "/archivos/procedimientos/tecnicos/flujograma/"+procedureId;
					}
					if(radioValue==3){
						url = "/archivos/procedimientos/tecnicos/anexos/"+procedureId;
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
										'<a href="/procedimiento/tecnicos/'+item.originalName+'.'+item.extension+'">'+
										item.title+'</a>'+
										'<i class="fa fa-times pull-right" onclick="deleteFile(\''+
										item.originalName+'\',\'{{$tecnico->id}}\',\''+item.id+'\''+
										',\'formato\',\'/procedimiento/tecnico/archivos/formato/\')"></i></li>')
							});
							listaArchivos.push('</div>')

							$('div.lista-formatos').replaceWith(listaArchivos.join(''));
						}
						if(radioValue==2){
							listaFlujogramas=[];
							listaFlujogramas.pop();
							listaFlujogramas.push('<div class="lista-flujogramas">')
							$.each(data, function(i, item){
								listaFlujogramas.push('' +
										'<li id="file-flujograma-'+item.id+'" class="list-group-item list-group-item-info">'+
										'<a href="/procedimiento/tecnicos/'+item.originalName+'.'+item.extension+'">'+
										item.title+'</a>'+
										'<i class="fa fa-times pull-right" onclick="deleteFile(\''+
										item.originalName+'\',\'{{$tecnico->id}}\',\''+item.id+'\''+
										',\'flujograma\',\'/procedimiento/tecnico/archivos/flujograma/\')"></i></li>')
							});
							listaFlujogramas.push('</div>')

							$('div.lista-flujogramas').replaceWith(listaFlujogramas.join(''));
						}
						if(radioValue==3){
							listaAnexos=[];
							listaAnexos.push('<div class="lista-anexos">')
							$.each(data, function(i, item){
								listaAnexos.push(
									'<li id="file-anexo-'+item.id+'" ' +
										'class="list-group-item list-group-item-info">'+
									'<a href="/procedimiento/tecnicos/' +item.originalName+ '.' +item.extension+ '">'
										+item.title+
									'</a>'+
										'<i class="fa fa-times pull-right" ' +
											'onclick="deleteFile(\'' +item.originalName+ '\',\'{{$tecnico->id}}\',\'' +item.id+ '\''+
										',\'anexo\',\'/procedimiento/tecnico/archivos/anexo/\')">' +
										'</i>' +
									'</li>')
							});
							listaAnexos.push('</div>')

							$('div.lista-anexos').replaceWith(listaAnexos.join(''));
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
									url:url+idProcedure+'/'+idAnnexedFile,
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
	<!-- Script de Pasos -->
	<script>
		var num=0;
		var csrf = $("meta[name='csrf_token']").attr('content');

		function agregar() {
			num+=1;
			$('#pasos').append('<li class="esk">'+
					'<div class="input-group">'+
					'<input placeholder="Descripcion del paso" name="step[]" class="form-control step"/>'+
					'<span class="input-group-btn step'+num+'"><a class="btn btn-danger" onclick="eliminar('+num+')" >'+
					'<span class="glyphicon glyphicon-remove"></span>Eliminar</a></span>'+
					'</div></li>')
		}
		function eliminar(num) {
			var item = $('span.step'+num).closest('li.esk').fadeOut();
			item.remove();
		}

		function validar(){
			var i=0;
			var flag = true;
			var pasos = [];
			$('input.step').each(function(){
				if($(this).val() == "" ){
					$(this).addClass("has-warning");
					flag = false;
				}
				i+=1;
			});
			return flag;
		}

		function enviar(procedureId){
			var i=0;
			var pasos = [];
			$('input.step').each(function(){
				pasos[i]= $(this).val();
				i+=1;
			});
			if (validar()) {
				swal({
							title: "¿Esta seguro de guardar?",
							text: "se estableceran los pasos",
							type: "info",
							showCancelButton: true,
							confirmButtonColor: "#658DF3",
							confirmButtonText: "Guardar",
							closeOnConfirm: false
						},
						function(){
							$.ajax({
								type: "POST",
								url: "/pasos/procedimientos/tecnicos/"+procedureId,
								headers: {
									'X-CSRF-Token': csrf,
								},
								data:{
									steps: pasos
								},
								success: function(data){
									console.log(data);
									swal("Subido con exito", "Se han registrado los pasos", "success");
								},
								error: function(data){
									swal("Error", "Problemas al subir", "error");
								}
							})
						}
				)
			}else {
				swal("Error", "No pueden haber pasos vacios", "error");
			}};
	</script>
@endsection

