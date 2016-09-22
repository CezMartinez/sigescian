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
    <div class="form-group {{$errors->has('department_id') ? 'has-error': ''}}">
        <label for="department_id" class="control-label">Departamento</label>
        {!! Form::select('department_id',$departments,null,['id'=>'department_id','class' => 'form-control','onchange'=>'myfun()']) !!}
        @if ($errors->has('department_id'))
            <span class="help-block">
                    <strong>{{ $errors->first('department_id') }}</strong>
                </span>
        @endif

    </div>

    <button class="btn btn-primary">Guardar Procedimiento</button>
</form>

@section('scripts')
    <script>
        function myfun(){
            $.get('/select-dep/'+$('#department_id').val(),function(data){

            })
        }
    </script>
@endsection