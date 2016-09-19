<form action="/equipos/{{$equipments->id}}/calibrate" method="POST">
    {{ method_field('POST') }}
    {{ csrf_field() }}
    <div class="form-group {{$errors->has('date_calibration') ? 'has-error': ''}} ">
        <label for="date_calibration">Fecha Calibracion:</label>
        <input type="date" name="date_calibration" class="form-control" value="{{old('date_calibration',\Carbon\Carbon::today()->format('Y-m-d'))}}" required autofocus>
        @if ($errors->has('date_calibration'))
            <span class="help-block">
                <strong>{{ $errors->first('date_calibration') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('days_of_calibration') ? 'has-error': ''}} ">
        <label for="days_of_calibration">Duracion de Calibracion(dias):</label>
        <input type="number" name="days_of_calibration" class="form-control" value="{{old('days_of_calibration',$equipments->days_of_calibration)}}" required autofocus min="1">
        @if ($errors->has('days_of_calibration'))
            <span class="help-block">
                <strong>{{ $errors->first('days_of_calibration') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('user_id') ? 'has-error': ''}} ">
        <label for="user_id">Calibrado por:</label>
        @if($equipments->user_id==null)
            {{Form::select('user_id',$users,null,['class'=>'form-control'])}}
        @else
            {{Form::select('user_id',$users,$equipments->user_id,['class'=>'form-control'])}}
        @endif
        @if ($errors->has('user_id'))
            <span class="help-block">
                <strong>{{ $errors->first('user_id') }}</strong>
            </span>
        @endif
    </div>
    <button class="btn btn-primary">Actualizar Calibracion</button>
</form>