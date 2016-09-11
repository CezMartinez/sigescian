<form action="/materiales" method="post">
    {{csrf_field()}}
    <!-- name Form Input -->
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
    </div>
        <div class="form-group">
            <label for="description">Descripcion:</label>
            <input type="text" name="description" class="form-control" value="{{old('description')}}" required>
        </div>

        <button class="btn btn-primary">Agregar Material</button>
</form>

