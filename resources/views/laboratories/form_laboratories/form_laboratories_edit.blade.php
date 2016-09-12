<form action="/laboratorios/{{$laboratories->id}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <!-- name Form Input -->
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$laboratories->name)}}" required>
    </div>
        <div class="form-group">
            <label for="description">Descripcion:</label>
            <textarea name="description" class="form-control" required>{{old('description',$laboratories->description)}}</textarea>
        </div>
    <button class="btn btn-primary">Editar</button>
</form>