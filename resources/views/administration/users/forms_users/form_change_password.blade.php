<form action="/mi-perfil/{{$user->id}}/change" method="POST">
    {{ csrf_field() }}
    <br>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Contraseña:</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control" required name="password" placeholder="Contraseña Actual">
            @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>
    </div>
    <br>
    <br>
    <div class="form-group{{ $errors->has('password_new') ? ' has-error' : '' }}">
        <label for="password-new" class="col-md-4 control-label">Nueva Contraseña:</label>
        <div class="col-md-6">
            <input id="password-new" type="password" class="form-control" required name="password_new" placeholder="Nueva contraseña">
            @if ($errors->has('password_new'))
                <span class="help-block"><strong>{{ $errors->first('password_new') }}</strong></span>
            @endif
        </div>
    </div>
    <br>
    <br>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña:</label>
        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" required name="password_confirmation" placeholder="Confirme contraseña">
            @if ($errors->has('password_confirmation'))
                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
            @endif
        </div>
    </div>
    <br>
    <br>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Reiniciar Contraseña
            </button>
        </div>
    </div>
</form>