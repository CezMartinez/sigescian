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
			<form action="/procedimiento/administrativo/{{$administrativo->id}}/archivos-adjuntos" method="POST"
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
						@foreach($administrativo->annexedFiles()->get() as $file)
							<li id="file-{{$file->id}}" class="list-group-item list-group-item-info">
								<a href="/archivos/procedimientos/administrativos/{{$file->originalName}}.{{$file->extension}}"
								>
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
					</ul>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
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