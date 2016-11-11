<form action="/procedimientos/administrativos/{{$procedure->id}}" method="POST" id="update_proceodure" enctype="multipart/form-data">
{{method_field('PUT')}}
{{csrf_field()}}

<!-- name Form Input -->
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name" class="control-label">Nombre del Procedimiento:</label>
        <input type="text" name="name" class="form-control" value="{{old('name',str_replace($procedure->prefix,'',$procedure->name))}}" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- acronym Form Input -->
    <div class="form-group {{$errors->has('acronym') ? 'has-error': ''}}">
        <label for="acronym" class="control-label">Acrónimo del Procedimiento:</label>
        <input type="text" name="acronym" class="form-control" value="{{old('acronym',$procedure->acronym)}}" required autofocus>
        @if ($errors->has('acronym'))
            <span class="help-block">
                    <strong>{{ $errors->first('acronym') }}</strong>
                </span>
        @endif
    </div>

    {{-- politics --}}
    <div class="form-group {{$errors->has('politic') ? 'has-error': ''}}">
        <label for="politic" class="control-label">Política:</label>
        <textarea rows="2" name="politic" class="form-control" placeholder="Describa las politicas que definen este procedimiento" required autofocus>{{old('politic',$procedure->politic)}}</textarea>
        @if ($errors->has('politic'))
            <span class="help-block">
                <strong>{{ $errors->first('politic') }}</strong>
            </span>
        @endif
    </div>

    {{-- section --}}
    <div class="form-group {{$errors->has('section') ? 'has-error': ''}}">
        <label for="section" class="control-label">Sección:</label>
        {{Form::select('section',$sections,null,['id'=>'section','class'=>'form-control','onchange'=>'changedata()'])}}
        @if ($errors->has('section'))
            <span class="help-block">
                <strong>{{ $errors->first('section') }}</strong>
            </span>
        @endif
    </div>

    {{-- subsection --}}
    <div class="form-group {{$errors->has('subsection') ? 'has-error': ''}}">
        <label for="subsection" class="control-label">Subsección:</label>
        {{Form::select('subsection[]',['Seleccione una Seccion'],null,['id'=>'subsection','class'=>'form-control','disabled','readonly','multiple'])}}
        @if ($errors->has('subsection'))
            <span class="help-block">
                <strong>{{ $errors->first('subsection') }}</strong>
            </span>
        @endif
    </div>

        <div class="document-file">
            <ul class="list-group" id="lista_procedimiento">
                <label for="file" class="control-label">Archivo del Procedimiento:</label>
                <div class="lista-procedimientos">
                    @if($procedure->procedureDocument()->count() > 0 )
                        @foreach($procedure->procedureDocument()->get() as $file)

                            <li id="file-procedimiento-{{$file->id}}"
                                class="list-group-item list-group-item-info">

                                <a target="_blank" href="/archivos/procedimientos/4/2/{{$file->originalName}}">
                                    {{$file->title}}
                                </a>

                                <i class="fa fa-times pull-right"
                                   onclick="deleteFile  (
                                           '{{$file->title}}',
                                           '{{$procedure->id}}',
                                           '{{$file->id}}',
                                           'procedimiento',
                                           '/procedimiento/archivos/procedimiento/')"></i>
                            </li>
                        @endforeach
                    @else
                        <div class="form-group {{$errors->has('file') ? 'has-error': ''}}">
                            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx" value="{{old('file')}}" required>
                            @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif
                        </div>
                    @endif
                </div>
            </ul>
        </div>


        <div class="form-group {{$errors->has('state') ? 'has-error': ''}} ">
        <label for="state" class="control-label">Estado: </label>
        {{Form::checkbox('state',null,$procedure->state)}}
    </div>


    <button class="btn btn-primary">Editar Procedimiento</button>
</form>

@section('scripts')
    <script>
        $('#subsection').select2();
        $("#subsection").select2({placeholder:"Seleccione Subsecciones de norma"});
    </script>
    <script>
        function changedata() {
            var section = $('#section').val();
            var subsection = $('#subsection');
            var option = $('#subsection').children().attr('class','optionsubseccion');
            if (section == 4 || section == 5)
            {
                subsection.removeAttr('disabled',false)
                subsection.removeAttr('readonly',false)
                $.getJSON("/subsecciones/"+section, function(result) {
                    $('#subsection').find('option').remove().end()
                    $.each(result, function(key,value) {
                        $('#subsection').append($('<option>').text(value).attr('value', key));
                    });
                });
            }else{
                $('#subsection').find('option').remove().end()
                subsection.attr('disabled',true)
                subsection.attr('readonly',true)
            }
        }

        function deleteFile(nameFile,idProcedure,idAnnexedFile,tipo, url){
            var csrf = $("meta[name='csrf_token']").attr('content');

            swal({
                        title: "¿Esta seguro de eliminar "+nameFile+"?",
                        text: "Si elimina este documento también será eliminada la relación con el procedimiento dejando el documento como obsoleto sin que esto pueda ser revertido ¿Desea continuar?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3c3cf2",
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar",
                        closeOnConfirm:true,
                        closeOnCancel:true,
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
                                        $("#lista_procedimiento").remove();
                                        var document_element = $(".document-file");
                                        document_element.append(
                                                '<div class="form-group">' +
                                                '<input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx" required>'+
                                                '</div>'
                                        )
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