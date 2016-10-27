<form action="/servicios/radio-agua-226" method="post">
    {{csrf_field()}}
    <div class="panel panel-primary">
        <div class="panel-heading"><h3> Informacion del Cliente</h3></div>
        <div class="panel-body">
            <div class="form-group {{$errors->has('date_application') ? 'has-error': ''}} ">
                <label for="date_application">Fecha de Solicitud:</label>
                <input type="date" name="date_application" class="form-control" value="{{old('date_application',\Carbon\Carbon::today()->format('Y-m-d'))}}" placeholder="01-02-16" required autofocus>
                @if ($errors->has('date_application'))
                    <span class="help-block">
                <strong>{{ $errors->first('date_application') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
                <label for="name">Solicitante:</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Juan Perez" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                @endif
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
            <div class="form-group {{$errors->has('phone') ? 'has-error': ''}} ">
                <label for="phone">Telefono:</label>
                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="2222-2222" required autofocus>
                @if ($errors->has('phone'))
                    <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error': ''}} ">
                <label for="email">Correo Electronico:</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="cliente@cliente.com" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                @endif
            </div>

        </div>
    </div>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading"><h3> Requisitos para el Analisis</h3></div>
        <div class="panel-body">
            <ul>
                <li>El volumen mínimo para realizar el análisis es de 3 litros por cada muestra.</li>
                <li>Cada muestra se recibirá en <strong>duplicado</strong>, en recipientes herméticamente sellados e identificados por el solicitante.</li>
                <li>Los recipientes pueden ser de material plástico o de vidrio</li>
            </ul>

        </div>
    </div>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading"><h3> Recepcion de muestras</h3></div>
        <div class="panel-body">
            <div class="form-group {{$errors->has('date_reception') ? 'has-error': ''}} ">
                <label for="date_reception">Fecha de Recepcion:</label>
                <input type="date" name="date_reception" class="form-control" value="{{old('date_reception',\Carbon\Carbon::today()->format('Y-m-d'))}}" placeholder="01-02-16" required autofocus>
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
                            <div class="form-group {{$errors->has('number_samples') ? 'has-error': ''}} ">
                                <label for="number_samples">Numero de muestras:</label>
                                <input type="number" min="0" name="number_samples" class="form-control" value="{{old('number_samples')}}" placeholder="5" required autofocus>
                                @if ($errors->has('number_samples'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('number_samples') }}</strong>
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
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Condiciones del Servicio</h3></div>
        <div class="panel-body">
            <ul>
                <li>El tiempo de preparación de las muestras, mediciones y elaboración del informe es de 45 días aproximadamente, a partir de la fecha de recepción de las mismas</li>
                <li>Las muestras deberán ser remitidas a las instalaciones del CIAN en días y horas hábiles (lunes a viernes, de 8:30 a 11:30 a.m. y 1:30 a 4:30 p.m.) y con <u><strong>cita previa</strong></u> acordada al 2235-9035 o al correo <a href="mailto:servicioscianfia@gmail.com?Subject=F-SS-PG9.2R">servicioscianfia@gmail.com</a></li>
                <li>Cada muestra se recibirá en <strong>duplicado</strong>, en recipientes herméticamente sellados e identificados por el solicitante.</li>
                <li>Los resultados de los análisis se referirán solamente a las muestras recibidas en el CIAN</li>
                <li>La información sobre la procedencia, la identificación y demás referencias de las muestras recibidas en este laboratorio, serán responsabilidad únicamente del solicitante.</li>

            </ul>

        </div>
    </div>
    <hr>
    <button class="btn btn-primary">Guardar Solicitud</button>
</form>