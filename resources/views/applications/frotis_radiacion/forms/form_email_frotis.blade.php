{{csrf_field()}}
<div class="panel-heading"><h3> Informacion del Cliente</h3></div>
<div class="panel-body">
    @if($apply->frotis==0)
        <label for="type_service" class="checkbox-inline"><input type="checkbox" readonly disabled name="frotis" value="1">Frotis</label>
    @else
        <label for="type_service" class="checkbox-inline"><input type="checkbox" readonly disabled checked="true" name="frotis" value="1">Frotis</label>
    @endif

        @if($apply->radiation==0)
            <label for="type_service" class="checkbox-inline"><input type="checkbox" readonly disabled name="radiation" value="2">Nivel de Radiación</label>
        @else
            <label for="type_service" class="checkbox-inline"><input type="checkbox" readonly disabled checked="true" name="frotis" value="2">Nivel de Radiación</label>
        @endif

    <br>
    <br>
    <p><strong>Fecha de Solicitud: </strong>{{$apply->created_at->format('d/m/Y')}}</p>
    <p><strong>Solicitante: </strong>{{$apply->petitioner}}</p>
    <p><strong>DUI: </strong>{{$apply->dui}}</p>
    <p><strong>Direccion: </strong>{{$apply->address}}</p>
    <p><strong>Telefono: </strong>{{$apply->phone}}</p>
    <p><strong>Email: </strong>{{$apply->email}}</p>
</div>
<hr>
<div class="panel-heading"><h3> Requisitos para el Analisis</h3></div>
<div class="panel-body">
    <p>Para el trámite de la <strong>Constancia de No Contaminación Radiactiva </strong>y/o de la <strong>Constancia de Nivel de Radiación</strong>, se deben remitir al CIAN los dispositivos nucleares en su contenedor, verificando que los dispositivos contengan las viñetas donde especifican los tipos de fuentes radiactivas con sus números de serie y fechas de fabricación; en el caso de los densímetros nucleares, el dispositivo debe tener inscrito su número de serie, modelo y nombre del fabricante.</p>
</div>
<hr>
<div class="panel-heading"><h3>Condiciones del Servicio</h3></div>
<div class="panel-body">
    <ul>
        <li>El método de medición utilizado en la prueba de no contaminación radiactiva superficial externa es la espectrometría gamma de alta resolución de bajo fondo, mediante muestreo de barrido superficial (frotis)</li>
        <li>El tiempo de preparación de las muestras, mediciones y elaboración del informe es de cuatro días hábiles aproximadamente, a partir de la fecha de realización de la prueba y con <u><strong>cita previa</strong></u> acordada al 2235-9035 o al correo <a href="mailto:servicioscianfia@gmail.com">servicioscianfia@gmail.com</a></li>
        <li>El método utilizado para determinar el nivel de radiación es la medición isométrica de la tasa de dosis</li>
        <li>El tiempo para realización de cálculos y elaboración del informe es de tres días hábiles aproximadamente, a partir de la fecha de medición y con <u><strong>cita previa</strong></u> acordada al 2235-9035 o al correo <a href="mailto:servicioscianfia@gmail.com">servicioscianfia@gmail.com</a></li>
        <li>Los dispositivos nucleares en su contenedor deben ser remitidos a las instalaciones del CIAN en días y horas hábiles (lunes a viernes, de 8:30 a 11:30 a.m. y 1:30 a 4:30 p.m.).</li>
        <li>Los resultados de los análisis se referirán solamente a los dispositivos recibidos en el CIAN.</li>
        <li>La información sobre la procedencia, la identificación y demás referencias de los dispositivos recibidos, serán responsabilidad del solicitante únicamente.</li>
        <li>Se recomienda que al remitir los densímetros nucleares, siempre vengan dos personas: una que sepa manipularlo y otra que le de custodia mientras se realizan los trámites administrativos.</li>
    </ul>
</div>
<hr>
<a href="{{ url('/servicios/frotis-radiacion/'.$apply->id.'/confirmar') }}" class="btn btn-primary">Confirmar Solicitud</a>