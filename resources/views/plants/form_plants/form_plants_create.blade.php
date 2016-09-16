<form action="/equipos" method="post">
    {{csrf_field()}}
    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('brand') ? 'has-error': ''}} ">
        <label for="brand">Marca:</label>
        <input type="text" name="brand" class="form-control" value="{{old('brand')}}" required autofocus>
        @if ($errors->has('brand'))
            <span class="help-block">
                <strong>{{ $errors->first('brand') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('model') ? 'has-error': ''}} ">
        <label for="model">Modelo:</label>
        <input type="text" name="model" class="form-control" value="{{old('model')}}" required autofocus>
        @if ($errors->has('model'))
            <span class="help-block">
                <strong>{{ $errors->first('model') }}</strong>
            </span>
        @endif
    </div>
    <div class="row">
        <div class="form-group col-md-6{{$errors->has('date_calibration') ? 'has-error': ''}} ">
            <label for="date_calibration">Fecha Calibracion:</label>
            <input type="date" name="date_calibration" class="form-control" value="{{old('date_calibration')}}" required autofocus>
            @if ($errors->has('date_calibration'))
                <span class="help-block">
                <strong>{{ $errors->first('date_calibration') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group col-md-6{{$errors->has('date_end_calibration') ? 'has-error': ''}} ">
            <label for="date_end_calibration">Fecha Finalizacion de Calibracion:</label>
            <input type="date" name="date_end_calibration" class="form-control" value="{{old('date_end_calibration')}}" required autofocus>
            @if ($errors->has('date_end_calibration'))
                <span class="help-block">
                <strong>{{ $errors->first('date_end_calibration') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <button class="btn btn-primary">Agregar Equipo</button>
</form>