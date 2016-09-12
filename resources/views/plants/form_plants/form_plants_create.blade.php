<form action="/equipos" method="post">
    {{csrf_field()}}
    <!-- name Form Input -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
        </div>
        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" name="brand" class="form-control" value="{{old('brand')}}" required>
        </div>
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" name="model" class="form-control" value="{{old('model')}}" required>
        </div>

        <button class="btn btn-primary">Agregar Equipo</button>
</form>