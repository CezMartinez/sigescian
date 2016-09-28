<form action="/departamentos" method="POST">
    {{csrf_field()}}
    <!-- name Form Input -->
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name" class="control-label">Nombre del departamento:</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Departamento de Electronica Nuclear" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- description Form Input -->
    <div class="form-group {{$errors->has('description') ? 'has-error': ''}}">
        <label for="description" class="control-label">Descripcion del departamento:</label>
        <textarea rows="10" cols="10" name="description" class="form-control" placeholder="Departamento que estudia el subcampo de la electrónica en donde se ocupan del diseño y uso de sistemas electrónicos de alta velocidad para la física nuclear y física de partículas elementales de investigación" required autofocus>{{old('description')}}</textarea>
        @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
        @endif
    </div>

    <button class="btn btn-primary">Guardar Departamento</button>
</form>