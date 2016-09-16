 <form action="/administracion/roles/{{$role->id}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <!-- name Form Input -->
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$role->name)}}">
    </div>

    <!-- permission Form Input -->
    <div class="form-group">
        <label for="permission">Permisisos asignados:</label>
        {!! Form::select('permission[]',$permissionList,$rolePermissionList,['class' => 'form-control','multiple']) !!}
    </div>

     <button class="btn btn-primary">Editar</button>
</form>

