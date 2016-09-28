<form action="/laboratorios/{{$laboratory->id}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <!-- name Form Input -->
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$laboratory->name)}}" placeholder="Dosimetria" required autofocus>
    </div>
        <div class="form-group">
            <label for="description">Descripcion:</label>
            <textarea name="description" class="form-control" placeholder="Laboratorio de Dosimetria personal externa TLD" required autofocus>{{old('description',$laboratory->description)}}</textarea>
        </div>

        <div class="form-group">
            <label for="department" class="control-label">Departamento</label>
            {{Form::select('department',$departments,$id,['class'=>'form-control'])}}
        </div>

    <button class="btn btn-primary">Editar</button>
</form>