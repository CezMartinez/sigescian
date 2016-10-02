<form action="/procedimientos/administrativos/{{$procedure->id}}" method="POST">
{{method_field('PUT')}}
{{csrf_field()}}

<!-- name Form Input -->
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name" class="control-label">Nombre del Procedimiento:</label>
        <input type="text" name="name" class="form-control" value="{{old('name',str_replace($procedure->prefix,'',$procedure->name))}}" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- acronym Form Input -->
    <div class="form-group {{$errors->has('acronym') ? 'has-error': ''}}">
        <label for="acronym" class="control-label">Acrónimo del Procedimiento:</label>
        <input type="text" name="acronym" class="form-control" value="{{old('acronym',$procedure->acronym)}}" required autofocus>
        @if ($errors->has('acronym'))
            <span class="help-block">
                    <strong>{{ $errors->first('acronym') }}</strong>
                </span>
        @endif
    </div>

    {{-- politics --}}
    <div class="form-group {{$errors->has('politic') ? 'has-error': ''}}">
        <label for="politic" class="control-label">Política:</label>
        <textarea rows="5" name="politic" class="form-control" placeholder="Describa las politicas que definen este procedimiento" required autofocus>{{old('politic',$procedure->politic)}}</textarea>
        @if ($errors->has('politic'))
            <span class="help-block">
                <strong>{{ $errors->first('politic') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{$errors->has('state') ? 'has-error': ''}} ">
        <label for="state" class="control-label">Estado: </label>
        {{Form::checkbox('state',null,$procedure->state)}}
    </div>


    <button class="btn btn-primary">Editar Procedimiento</button>
</form>