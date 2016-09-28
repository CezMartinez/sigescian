<form action="/procedimientos/administrativos" method="POST">
{{csrf_field()}}
<!-- name Form Input -->
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name" class="control-label">Nombre del procedimiento:</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Comunicacion Interna" required>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- acronym Form Input -->
    <div class="form-group {{$errors->has('acronym') ? 'has-error': ''}}">
        <label for="acronym" class="control-label">Acrónimo del Procedimiento:</label>
        <input type="text" name="acronym" class="form-control" value="{{old('acronym')}}" placeholder="CI" required autofocus>
        @if ($errors->has('acronym'))
            <span class="help-block">
                    <strong>{{ $errors->first('acronym') }}</strong>
                </span>
        @endif
    </div>

    {{-- politics --}}
    <div class="form-group {{$errors->has('politic') ? 'has-error': ''}}">
        <label for="politic" class="control-label">Política:</label>
        <textarea rows="5" name="politic" class="form-control" placeholder="Describa las politicas que definen este procedimiento" required autofocus>{{old('politic')}}</textarea>
        @if ($errors->has('politic'))
            <span class="help-block">
                <strong>{{ $errors->first('politic') }}</strong>
            </span>
            @endif
    </div>

    {{-- section --}}
    <div class="form-group {{$errors->has('section') ? 'has-error': ''}}">
        <label for="section" class="control-label">Seccion:</label>
        {{Form::select('section',$sections,null,['id'=>'section','class'=>'form-control','onchange'=>'changedata()'])}}
        @if ($errors->has('section'))
            <span class="help-block">
                <strong>{{ $errors->first('section') }}</strong>
            </span>
        @endif
    </div>

    {{-- subsection --}}
    <div class="form-group {{$errors->has('subsection') ? 'has-error': ''}}">
        <label for="subsection" class="control-label">Subseccion:</label>
        {{Form::select('subsection[]',['selecciones seccion'],null,['id'=>'subsection','class'=>'form-control','disabled','readonly','multiple'])}}
        @if ($errors->has('subsection'))
            <span class="help-block">
                <strong>{{ $errors->first('subsection') }}</strong>
            </span>
        @endif
    </div>

    <button class="btn btn-primary">Guardar Procedimiento</button>
</form>

@section('scripts')
    <script>
        $('#subsection').select2();
        $("#subsection").select2({placeholder:"Seleccione subsecciones"});
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
    </script>

@endsection