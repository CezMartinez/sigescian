<form action="/servicios/radio-agua-226" method="post">
    {{csrf_field()}}
    <div class="panel panel-primary">
        <div class="panel-heading"><h3> Informacion del Cliente</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group {{$errors->has('petitioner') ? 'has-error': ''}} ">
                        <label for="name">Solicitante:</label>
                        <input type="text" name="petitioner" class="form-control" value="{{old('petitioner')}}" placeholder="Juan Perez" required autofocus>
                        @if ($errors->has('petitioner'))
                            <span class="help-block"><strong>{{ $errors->first('petitioner') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{$errors->has('dui') ? 'has-error': ''}} ">
                        <label for="dui">DUI:</label>
                        <input type="dui" name="dui" class="form-control" value="{{old('dui')}}" placeholder="03774811-2" required autofocus>
                        @if ($errors->has('dui'))
                            <span class="help-block"><strong>{{ $errors->first('dui') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group {{$errors->has('address') ? 'has-error': ''}} ">
                <label for="address">Direccion:</label>
                <textarea name="address" class="form-control" placeholder="Avenida Siempre Viva 742" required autofocus>{{old('address')}}</textarea>
                @if ($errors->has('address'))
                    <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{$errors->has('phone') ? 'has-error': ''}} ">
                        <label for="phone">Telefono:</label>
                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="2222-2222" required autofocus>
                        @if ($errors->has('phone'))
                            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{$errors->has('email') ? 'has-error': ''}} ">
                        <label for="email">Correo Electronico:</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="cliente@cliente.com" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading"><h3> Recepcion de muestras</h3></div>
        <div class="panel-body">
            <div class="form-group {{$errors->has('date_reception') ? 'has-error': ''}} ">
                <label for="date_reception">Fecha de Recepcion:</label>
                <input type="date" name="date_reception" class="form-control" value="{{old('date_reception',\Carbon\Carbon::today()->format('Y-m-d'))}}" placeholder="01-02-16" autofocus>
                @if ($errors->has('date_reception'))
                    <span class="help-block">
                <strong>{{ $errors->first('date_reception') }}</strong>
            </span>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label><br></label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{$errors->has('samples') ? 'has-error': ''}} ">
                                <label for="samples">Numero de muestras:</label>
                                <input type="number" min="0" name="samples" class="form-control" value="{{old('samples')}}" placeholder="5" autofocus>
                                @if ($errors->has('samples'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('samples') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <label>Volumen</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('liters') ? 'has-error': ''}} ">
                                <label for="liters">Litros</label>
                                <input type="number" min="0" name="liters" class="form-control" value="{{old('liters')}}" placeholder="5" autofocus>
                                @if ($errors->has('liters'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('liters') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('gallons') ? 'has-error': ''}} ">
                                <label for="gallons">Galones</label>
                                <input type="number" min="0" name="gallons" class="form-control" value="{{old('gallons')}}" placeholder="5" autofocus>
                                @if ($errors->has('gallons'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('gallons') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <button class="btn btn-primary">Guardar Solicitud</button>
</form>