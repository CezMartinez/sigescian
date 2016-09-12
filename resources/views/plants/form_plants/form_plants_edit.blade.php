<form action="/equipos/{{$plants->id}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$plants->name)}}" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('brand') ? 'has-error': ''}} ">
        <label for="brand">Marca:</label>
        <input type="text" name="brand" class="form-control" value="{{old('brand',$plants->brand)}}" required autofocus>
        @if ($errors->has('brand'))
            <span class="help-block">
                <strong>{{ $errors->first('brand') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('model') ? 'has-error': ''}} ">
        <label for="model">Modelo:</label>
        <input type="text" name="model" class="form-control" value="{{old('model',$plants->model)}}" required autofocus>
        @if ($errors->has('model'))
            <span class="help-block">
                <strong>{{ $errors->first('model') }}</strong>
            </span>
        @endif
    </div>
    <button class="btn btn-primary">Editar</button>
</form>