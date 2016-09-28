<form action="/materiales/{{$materials->id}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$materials->name)}}" placeholder="Fosforo" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('description') ? 'has-error': ''}} ">
        <label for="description">Descripcion:</label>
        <textarea name="description" class="form-control" placeholder="No metal multivalente perteneciente al grupo del nitrógeno" required autofocus>{{old('description',$materials->description)}}</textarea>
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('laboratory_id') ? 'has-error': ''}} ">
        <label for="laboratory_id">Laboratorio:</label>
        {!! Form::select('laboratory_id',$lab,$materials->laboratory_id,['class' => 'form-control']) !!}
        @if ($errors->has('laboratory_id'))
            <span class="help-block">
                <strong>{{ $errors->first('laboratory_id') }}</strong>
            </span>
        @endif
    </div>
    <button class="btn btn-primary">Editar</button>
</form>