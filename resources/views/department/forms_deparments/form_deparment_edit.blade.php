<form action="/departamentos/{{$department->id}}" method="POST">
    {{method_field('PUT')}}
    {{csrf_field()}}
    <!-- name Form Input -->
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name" class="control-label">Nombre del departamento:</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$department->name)}}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- description Form Input -->
    <div class="form-group {{$errors->has('description') ? 'has-error': ''}}">
        <label for="description" class="control-label">Descripcion del departamento:</label>
        <textarea name="description" class="form-control" >{{$department->description}}</textarea>
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>

    <button class="btn btn-primary">Editar Departamento</button>
</form>
