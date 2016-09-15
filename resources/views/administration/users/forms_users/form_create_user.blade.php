<form action="/administracion/usuarios/" method="POST">
    {{ csrf_field() }}

    <!-- first_name Form Input -->
    <div class="form-group {{$errors->has('first_name') ? 'has-error': ''}} ">
        <label for="first_name" class="control-label">Nombres:</label>
        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" autofocus >
        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>


    <!-- last_name Form Input -->
    <div class="form-group {{$errors->has('last_name') ? 'has-error' : ''}}">
        <label for="last_name" >Apellidos:</label>
        <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}">
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>

    <!-- email Form Input -->
    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" value="{{old('email')}}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <!-- roles Form Input -->
    <div class="form-group">
        <label for="roles">Asigne roles:</label>
        {{Form::select('roles[]',$roleList,null,['class'=>'form-control', 'multiple'])}}
    </div>

    <!-- password Form Input -->
    <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" class="form-control" required>
        @if($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <!-- password_confirmation Form Input -->
    <div class="form-group">
        <label for="password_confirmation">Confirme Contraseña:</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <button class="btn btn-primary">
        Guardar
    </button>
    
</form>