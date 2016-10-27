<form action="/servicios/frotis-radiacion" method="post">
    {{csrf_field()}}
    <div class="panel panel-primary">
        <div class="panel-heading"><h3> Informacion del Cliente</h3></div>
        <div class="panel-body">
            <div class="form-group {{$errors->has('type_service') ? 'has-error': ''}} ">
                <label for="type_service" class="checkbox-inline"><input type="checkbox" name="frotis" value="1">Frotis</label>
                <label for="type_service" class="checkbox-inline"><input type="checkbox" name="radiation" value="2">Nivel de Radiación</label>
            @if ($errors->has('type_service'))
                    <span class="help-block">
                <strong>{{ $errors->first('type_service') }}</strong>
            </span>
                @endif
            </div>
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
            <p>Para el trámite de la <strong>Constancia de No Contaminación Radiactiva </strong>y/o de la <strong>Constancia de Nivel de Radiación</strong>, se deben remitir al CIAN los dispositivos nucleares en su contenedor, verificando que los dispositivos contengan las viñetas donde especifican los tipos de fuentes radiactivas con sus números de serie y fechas de fabricación; en el caso de los densímetros nucleares, el dispositivo debe tener inscrito su número de serie, modelo y nombre del fabricante.</p>

        </div>
    </div>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Condiciones del Servicio</h3></div>
        <div class="panel-body">
            <ul>
                <li>El método de medición utilizado en la prueba de no contaminación radiactiva superficial externa es la espectrometría gamma de alta resolución de bajo fondo, mediante muestreo de barrido superficial (frotis)</li>
                <li>El tiempo de preparación de las muestras, mediciones y elaboración del informe es de cuatro días hábiles aproximadamente, a partir de la fecha de realización de la prueba y con <u><strong>cita previa</strong></u> acordada al 2235-9035 o al correo <a href="mailto:servicioscianfia@gmail.com?Subject=F-SS-PG9.2F">servicioscianfia@gmail.com</a></li>
                <li>El método utilizado para determinar el nivel de radiación es la medición isométrica de la tasa de dosis</li>
                <li>El tiempo para realización de cálculos y elaboración del informe es de tres días hábiles aproximadamente, a partir de la fecha de medición y con <u><strong>cita previa</strong></u> acordada al 2235-9035 o al correo <a href="mailto:servicioscianfia@gmail.com?Subject=F-SS-PG9.2F">servicioscianfia@gmail.com</a></li>
                <li>Los dispositivos nucleares en su contenedor deben ser remitidos a las instalaciones del CIAN en días y horas hábiles (lunes a viernes, de 8:30 a 11:30 a.m. y 1:30 a 4:30 p.m.).</li>
                <li>Los resultados de los análisis se referirán solamente a los dispositivos recibidos en el CIAN.</li>
                <li>La información sobre la procedencia, la identificación y demás referencias de los dispositivos recibidos, serán responsabilidad del solicitante únicamente.</li>
                <li>Se recomienda que al remitir los densímetros nucleares, siempre vengan dos personas: una que sepa manipularlo y otra que le de custodia mientras se realizan los trámites administrativos.</li>
            </ul>
        </div>
    </div>
    <hr>
    <button class="btn btn-primary">Guardar Solicitud</button>
</form>