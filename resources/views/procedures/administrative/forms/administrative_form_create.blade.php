<form action="/procedimientos/administrativos" method="POST">
{{csrf_field()}}
<!-- name Form Input -->
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name" class="control-label">Nombre del procedimiento:</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}} " required>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- description Form Input -->
    <div class="form-group {{$errors->has('acronym') ? 'has-error': ''}}">
        <label for="acronym" class="control-label">Acrónimo del Procedimiento:</label>
        <input type="text" name="acronym" class="form-control" value="{{old('acronym')}} " required>
        @if ($errors->has('acronym'))
            <span class="help-block">
                    <strong>{{ $errors->first('acronym') }}</strong>
                </span>
        @endif
    </div>

    <div class="form-group {{$errors->has('politic') ? 'has-error': ''}}">
    <label for="politic" class="control-label">Política:</label>
    <input type="text" name="politic" class="form-control" value="{{old('politic')}} " required>
    @if ($errors->has('politic'))
        <span class="help-block">
                    <strong>{{ $errors->first('politic') }}</strong>
                </span>
        @endif
        </div>

    <div class="form-group {{$errors->has('description') ? 'has-error': ''}}">
        <label for="description" class="control-label">Descripción:</label>
        <input type="text" name="description" class="form-control" value="{{old('description')}} " required>
        @if ($errors->has('description'))
            <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
        @endif
    </div>

    <button class="btn btn-primary">Guardar Procedimiento</button>
</form>