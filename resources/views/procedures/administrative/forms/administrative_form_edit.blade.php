<form action="/procedimientos/administrativos/{{$procedure->code}}" method="POST">
{{method_field('PUT')}}
{{csrf_field()}}

<!-- name Form Input -->
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name" class="control-label">Nombre del Procedimiento:</label>
        <input type="text" name="name" class="form-control" value="{{old('name',str_replace('Procedimiento Administrativo De','',$procedure->name))}}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{$errors->has('state') ? 'has-error': ''}} ">
        <label for="state" class="control-label">Estado: </label>
        {{Form::checkbox('state',null,$procedure->state)}}
    </div>


    <button class="btn btn-primary">Editar Procedimiento</button>
</form>