<form action="/clientes/{{$clients->id}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <div class="form-group">
        <label for="type">Tipo de Cliente</label>
        {!! Form::select('customer_type',$types,$clients->customer_type,['class' => 'form-control']) !!}
    </div>
    <!-- name Form Input -->
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$clients->name)}}" required>
    </div>
    <div class="form-group">
        <label for="nit">NIT</label>
        <input type="text" name="nit" class="form-control" value="{{old('nit',$clients->nit)}}" required>
    </div>
        <div class="form-group">
            <label for="address">Direccion:</label>
            <input type="text" name="address" class="form-control" value="{{old('address',$clients->address)}}" required>
        </div>
        <div class="form-group">
            <label for="legal_agent">Representante Legal:</label>
            <input type="text" name="legal_agent" class="form-control" value="{{old('legal_agent',$clients->legal_agent)}}">
        </div>
    <button class="btn btn-primary">Editar</button>
</form>

