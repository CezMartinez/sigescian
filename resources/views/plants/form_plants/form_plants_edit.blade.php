<form action="/equipos/{{$plants->id}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <!-- name Form Input -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{old('name',$plants->name)}}" required>
        </div>
        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" name="brand" class="form-control" value="{{old('brand',$plants->brand)}}" required>
        </div>
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" name="model" class="form-control" value="{{old('model',$plants->model)}}" required>
        </div>
    <button class="btn btn-primary">Editar</button>
</form>