<form >
    {{ method_field('POST') }}
    {{ csrf_field() }}
    <div class="form-group {{$errors->has('date_calibration') ? 'has-error': ''}} ">
        <label for="date_calibration">Fecha Calibración:</label>
        <input type="date" name="date_calibration" id="date_calibration" class="form-control" value="{{old('date_calibration',\Carbon\Carbon::today()->format('Y-m-d'))}}" placeholder="01-02-16" required autofocus>
        @if ($errors->has('date_calibration'))
            <span class="help-block">
                <strong>{{ $errors->first('date_calibration') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('months_of_calibration') ? 'has-error': ''}} ">
        <label for="months_of_calibration">Duracion de Calibración (meses):</label>
        <input type="number" name="months_of_calibration" id="months_of_calibration" class="form-control" value="{{old('months_of_calibration',$equipments->days_of_calibration)}}" placeholder="4" required autofocus min="1">
        @if ($errors->has('months_of_calibration'))
            <span class="help-block">
                <strong>{{ $errors->first('months_of_calibration') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('calibrate_company') ? 'has-error': ''}} ">
        <label for="calibrate_company">Calibrado por:</label>
        <input type="text" name="calibrate_company" id="calibrate_company" class="form-control" value="{{old('calibrate_company',$equipments->calibrate_company)}}" placeholder="Mettler Toledo" required autofocus>
        @if ($errors->has('calibrate_company'))
            <span class="help-block">
                <strong>{{ $errors->first('calibrate_company') }}</strong>
            </span>
        @endif
    </div>
    <a class="btn btn-primary" onclick="calibrar()">Actualizar Calibración</a>
</form>