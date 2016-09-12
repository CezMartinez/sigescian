<form action="/clientes" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="type">Tipo de Cliente:</label>
        {!! Form::select('customer_type',$types,null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('nit') ? 'has-error': ''}} ">
        <label for="nit">NIT:</label>
        <input type="text" name="nit" class="form-control" value="{{old('nit')}}" required autofocus>
        @if ($errors->has('nit'))
            <span class="help-block">
                <strong>{{ $errors->first('nit') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('address') ? 'has-error': ''}} ">
        <label for="address">Direccion:</label>
        <textarea name="address" class="form-control">{{old('address')}}</textarea>
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('legal_agent') ? 'has-error': ''}} ">
        <label for="legal_agent">Representante Legal:</label>
        <input type="text" name="legal_agent" class="form-control" value="{{old('legal_agent')}}" required autofocus>
        @if ($errors->has('legal_agent'))
            <span class="help-block">
                <strong>{{ $errors->first('legal_agent') }}</strong>
            </span>
        @endif
    </div>
    <button class="btn btn-primary">Agregar Cliente</button>
</form>

