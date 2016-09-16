<form action="/materiales" method="post">
    {{csrf_field()}}
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
        <div class="form-group {{$errors->has('description') ? 'has-error': ''}} ">
            <label for="description">Descripcion:</label>
            <textarea name="description" class="form-control">{{old('description')}}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>

        <button class="btn btn-primary">Agregar Material</button>
</form>

