<form action="/administracion/roles" method="post">
    {{csrf_field()}}

    <!-- name Form Input -->
    <div class="form-group">
        <label for="name">Nombre del rol:</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Jefe de departamento" required autofocus>
    </div>

    <!-- permission Form Input -->
    <div class="form-group">
        <label for="permission">Asignar Permisos:</label>
        {!! Form::select('permission[]',$permissionList,null,['id'=>'selectPermission','class' => 'form-control','multiple','required']) !!}
    </div>

    <button class="btn btn-primary">Agregar Rol</button>
</form>

@section('scripts')
    <script>
        $('#selectPermission').select2();
    </script>
@endsection
