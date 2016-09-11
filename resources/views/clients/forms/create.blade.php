<form action="/clientes" method="post">
    {{csrf_field()}}

    <div class="form-group">
        <label for="type">Tipo de Cliente</label>
        {!! Form::select('customer_type',$types,null,['class' => 'form-control']) !!}
    </div>
    <!-- name Form Input -->
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
    </div>
    <div class="form-group">
        <label for="nit">NIT</label>
        <input type="text" name="nit" class="form-control" value="{{old('nit')}}" required>
    </div>
        <div class="form-group">
            <label for="address">Direccion:</label>
            <input type="text" name="address" class="form-control" value="{{old('address')}}" required>
        </div>
        <div class="form-group">
            <label for="legal_agent">Representante Legal:</label>
            <input type="text" name="legal_agent" class="form-control" value="{{old('legal_agent')}}">
        </div>
    <button class="btn btn-primary">Agregar Cliente</button>
</form>

