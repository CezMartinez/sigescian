@extends('app')

@section('content')


	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3> {{$administrativo->name}} </h3></div>
				<div class="panel-body">
					<p>Codigo: {{$administrativo->code}}</p>
					<p>Estado: {{$administrativo->status}}</p>
				</div>
			</div>
			<hr>
			<form action="/procedimiento/administrativo/{{$administrativo->id}}/archivos-adjuntos" id="uploadFile" method="POST"
				  class="dropzone"
				  id="annexed-files">
				{{csrf_field()}}
			</form>

		</div>
		<div class="col-md-6">

			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Archivos Anexos</h3></div>
				<div class="panel-body">
					<ul class="list-group">
						<div class="lista">
						@foreach($administrativo->annexedFiles()->get() as $file)

							<li id="file-{{$file->id}}" class="list-group-item list-group-item-info">

								<a href="/archivos/procedimientos/administrativos/{{$file->originalName}}.{{$file->extension}}">
									{{$file->title}}
								</a>

								<i class="fa fa-times pull-right"
								   onclick="deleteFile(
										   '{{$file->originalName}}',
										   '{{$administrativo->id}}',
										   '{{$file->id}}',
										   '/procedimiento/administrativo/archivo/')"></i>
							</li>
						@endforeach
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
		Dropzone.options.uploadFile= {
			init: function(){
				this.on("addedfile", function(file) {
	        // Create the remove button
				});
				this.on("success", function(file, responseText){
					$.ajax({
							type:'GET',
							url:'http://localhost:8000/archivos/procedimientos/administrativos/1',
							success: function(data){
							},
						})
						.done(function(data){
							listaArchivos=[];
							listaArchivos.push('<div class="lista">')
							$.each(data, function(i, item){
								listaArchivos.push('<li id="file-'+item.id+'" class="list-group-item list-group-item-info">'+
								'<a href="/procedimiento/administrativos/'+item.originalName+'.'+item.extension+'">'+
								item.title+'</a>'+
								'<i class="fa fa-times pull-right" onclick="deleteFile(\''+
								item.originalName+'\',\'{{$administrativo->id}}\',\''+item.id+'\''+
								',\'/procedimiento/administrativo/archivo/\')"></i></li>')
							});
							listaArchivos.push('</div>')
							console.log(listaArchivos.join(''));
							$('div.lista').replaceWith(listaArchivos.join(''));
						})
						.error(function(data){
							swal("Error",data.responseText,"error");
						});
				});

			}
		}



	</script>
	<script>
		function deleteFile(nameFile,idProcedure,idAnnexedFile, url){
			var csrf = $("meta[name='csrf_token']").attr('content');
			console.log(csrf);
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
								$('#file-'+idAnnexedFile).fadeOut();
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

deleteFile('lil2.png','1','57','/procedimiento/administrativo/archivo/')
