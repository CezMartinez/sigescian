<form action="/administracion/usuarios/{{$user->id}}" method="POST">
    {{ csrf_field() }}
    {{method_field('PUT')}}

    <!-- first_name Form Input -->
    <div class="form-group {{$errors->has('first_name') ? 'has-error': ''}} ">
        <label for="first_name" class="control-label">Nombres:</label>
        <input type="text" name="first_name" class="form-control" value="{{ old('first_name',$user->first_name) }}" autofocus >
        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>


    <!-- last_name Form Input -->
    <div class="form-group {{$errors->has('last_name') ? 'has-error' : ''}}">
        <label for="last_name" >Apellidos:</label>
        <input type="text" name="last_name" class="form-control" value="{{old('last_name',$user->last_name)}}">
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>

    <!-- email Form Input -->
    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" value="{{old('email',$user->email)}}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <!-- roles Form Input -->
    <div class="form-group">
        <label for="roles">Asigne roles:</label>
        {{Form::select('roles[]',$roleList,$userRoleList,['id'=>'selectRole','class'=>'form-control', 'multiple','required'])}}
    </div>


    <button class="btn btn-primary">
        Guardar
    </button>

</form>

@section('scripts')

    <script>
        $('#selectRole').select2({
           placeholder: "Seleccione los roles a asignar"
        });
    </script>

@endsection