<div class="panel-heading"><h3> Informacion del Cliente</h3></div>
<div class="panel-body">
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
        <ul>
            <li>El volumen mínimo para realizar el análisis es de 3 litros por cada muestra.</li>
            <li>Cada muestra se recibirá en <strong>duplicado</strong>, en recipientes herméticamente sellados e identificados por el solicitante.</li>
            <li>Los recipientes pueden ser de material plástico o de vidrio</li>
        </ul>

    </div>
<hr>
<div class="panel-heading"><h3> Recepcion de muestras</h3></div>
<div class="panel-body">
    <p><strong>Fecha de Recepcion: </strong>{{$apply->date_reception->format('d/m/Y')}}</p>

        <div class="row">
            <div class="col-md-4">
                <label><br></label>
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Numero de muestras: </strong>
                            @if($apply->samples==null)
                                No fueron entregadas
                            @else
                                {{$apply->samples}}
                            @endif</p></p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <label>Volumen</label>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Litros: </strong>
                            @if($apply->liters==null)
                               0
                            @else
                                {{$apply->liters}}
                            @endif</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Galones: </strong>
                            @if($apply->gallons==null)
                                0
                            @else
                                {{$apply->gallons}}
                            @endif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<hr>
<div class="panel-heading"><h3>Condiciones del Servicio</h3></div>
<div class="panel-body">
        <ul>
            <li>El tiempo de preparación de las muestras, mediciones y elaboración del informe es de 45 días aproximadamente, a partir de la fecha de recepción de las mismas</li>
            <li>Las muestras deberán ser remitidas a las instalaciones del CIAN en días y horas hábiles (lunes a viernes, de 8:30 a 11:30 a.m. y 1:30 a 4:30 p.m.) y con <u><strong>cita previa</strong></u> acordada al 2235-9035 o al correo <a href="mailto:servicioscianfia@gmail.com">servicioscianfia@gmail.com</a></li>
            <li>Cada muestra se recibirá en <strong>duplicado</strong>, en recipientes herméticamente sellados e identificados por el solicitante.</li>
            <li>Los resultados de los análisis se referirán solamente a las muestras recibidas en el CIAN</li>
            <li>La información sobre la procedencia, la identificación y demás referencias de las muestras recibidas en este laboratorio, serán responsabilidad únicamente del solicitante.</li>

        </ul>

    </div>
<hr>
<a href="/servicios/radio-agua-226/{{$apply->id}}/confirmar" class="btn btn-primary">Confirmar Solicitud</a>