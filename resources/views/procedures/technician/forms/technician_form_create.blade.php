<form action="/procedimientos/tecnicos" method="POST">
{{csrf_field()}}
<!-- name Form Input -->
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name" class="control-label">Nombre del procedimiento:</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}} " required>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- acronym Form Input -->
    <div class="form-group {{$errors->has('acronym') ? 'has-error': ''}}">
        <label for="acronym" class="control-label">Acrónimo del Procedimiento:</label>
        <input type="text" name="acronym" class="form-control" value="{{old('acronym')}} " required>
        @if ($errors->has('acronym'))
            <span class="help-block">
                    <strong>{{ $errors->first('acronym') }}</strong>
                </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('laboratory_id') ? 'has-error': ''}}">
        <label for="laboratory_id" class="control-label">Laboratorio:</label>
        {!! Form::select('laboratory_id',$laboratory,null,['class' => 'form-control']) !!}
        @if ($errors->has('laboratory_id'))
            <span class="help-block">
                    <strong>{{ $errors->first('laboratory_id') }}</strong>
                </span>
        @endif

    </div>
    <div class="form-group {{$errors->has('section') ? 'has-error': ''}}">
        <label for="section" class="control-label">Seccion de la Norma</label>
        {!! Form::select('section',$section,null,['id'=>'section','class' => 'form-control','onchange'=>'myfun()']) !!}
        @if ($errors->has('section'))
            <span class="help-block">
                    <strong>{{ $errors->first('section') }}</strong>
                </span>
        @endif

    </div>
    <div class="form-group {{$errors->has('sub_section') ? 'has-error': ''}}">
        <div class="select4" id='section4' style='display:none;'>
            <label for="sub_section" class="control-label">Seccion de la Norma</label>
            {!! Form::select('sub_section',$section4,null,['class' => 'form-control']) !!}
        </div>
        <div class="select5" id='section5' style='display:none;'>
            <label for="sub_section" class="control-label">Seccion de la Norma</label>
            {!! Form::select('sub_section',$section5,null,['class' => 'form-control']) !!}
        </div>
        @if ($errors->has('sub_section'))
            <span class="help-block">
                    <strong>{{ $errors->first('sub_section') }}</strong>
                </span>
        @endif

    </div>

    <button class="btn btn-primary">Guardar Procedimiento</button>
</form>

@section('scripts')
    <script>
        function myfun(){
            var el5 = document.getElementById('section5');
            var el4 = document.getElementById('section4');
            var x=$('#section').val();
            if(x==4){
                el4.style.display='block';
                el5.style.display='none';
            }else{
                if(x==5){

                    el5.style.display='block';
                    el4.style.display='none';
                }else{
                    el4.style.display='none';
                    el5.style.display='none';
                }
            }
        }
    </script>
@endsection