{{csrf_field()}}
<div class="panel-heading"><h3> Informacion del Cliente</h3></div>
<div class="panel-body">
    <p><strong>Fecha de Solicitud: </strong>{{$apply->created_at->format('d/m/Y')}}</p>
    <div class="row">
        <div class="col-md-8">
            <p><strong>Nombre o razon social: </strong> {{$apply->name}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Institucion: </strong>{{$tipo->name}}</p>
        </div>
    </div>
    <p><strong>Direccion: </strong>{{$apply->address}}</p>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Municipio: </strong>{{$apply->municipality}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Departamento: </strong>{{$apply->department}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Pais: </strong>{{$apply->country}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Telefono: </strong>{{$apply->phone}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Fax: </strong>{{$apply->fax}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Email: </strong>{{$apply->email}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <p><strong>Responsable: </strong>{{$apply->responsable}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>Cargo: </strong>{{$apply->position}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>DUI: </strong>{{$apply->dui}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>Actividad: </strong>{{$activi->name}}</p>
        </div>
    </div>
</div>
<hr>
<div class="panel-heading"><h3>Informacion Adicional:</h3></div>
<div class="panel-body">
    <p><strong>Fecha de vencimiento del permiso de operacion: </strong>{{$apply->date_reception->format('d/m/Y')}}</p>
    <br>
    <label>Personal de contacto para:</label>
    <p style="font-style: italic;"><strong>Confirmar Visita</strong></p>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Nombre: </strong>{{$apply->name_visit}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>Cargo: </strong>{{$apply->position_visit}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>Telefono: </strong>{{$apply->phone_visit}}</p>
        </div>
    </div>
    <p style="font-style: italic;"><strong>Tramites Administrativos</strong></p>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Nombre: </strong>{{$apply->name_admin}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>Cargo: </strong>{{$apply->position_admin}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>Telefono: </strong>{{$apply->phone_admin}}</p>
        </div>
    </div>
</div>
<hr>
<div class="panel-heading"><h3> Definicion del Servicio</h3></div>
<div class="panel-body">
    <p>El Laboratorio de Electrónica Nuclear del CIAN ofrece los siguientes servicios  a un  <strong>costo por equipo</strong> según el siguiente detalle,<strong>más un pago de transporte de $0.25 por kilómetro de distancia a la instalación:</strong></p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary">
            <th>
                Tipo de Equipo / Servicio
            </th>
            <th>
                Costo (US $)
            </th>
            </thead>
            <tbody>
            <tr>
                <td>Radiográfico Convencional (Movil o Fijo)</td>
                <td>198.00</td>
            </tr>
            <tr>
                <td>Tomografia Computarizada (TAC)</td>
                <td>250.00</td>
            </tr>
            <tr>
                <td>Rayos X con Fluoroscopía </td>
                <td>225.00</td>
            </tr>
            <tr>
                <td>Fluoroscopía, Brazo en C</td>
                <td>215.00</td>
            </tr>
            <tr>
                <td>Rayos X Mamográfico </td>
                <td>215.00</td>
            </tr>
            <tr>
                <td>Odontológico Convencional </td>
                <td>98.00</td>
            </tr>
            <tr>
                <td>Dental Panorámico </td>
                <td>122.00</td>
            </tr>
            <tr>
                <td>Control de calidad Cuarto Oscuro</td>
                <td>60.00</td>
            </tr>
            <tr>
                <td>Control de calidad de procesador automático de película radiográfica</td>
                <td>75.00</td>
            </tr>


            </tbody>
        </table>
        *Aranceles aprobados por la Asamblea General Universitaria y publicados en el Diario Oficial del día siete de diciembre de dos mil diez.    </div>
</div>
<hr>
<div class="panel-heading"><h3>CONDICIONES  PARA LA PRESTACION DEL SERVICIO DE CONTROL DE CALIDAD EN EQUIPOS DE R-X</h3></div>
<div class="panel-body">
    <ul>
        <li>Se deberá llenar el formulario de solicitud de servicio de control de calidad proporcionado por el Laboratorio de Electrónica Nuclear con la información requerida, Y presentar el documento en original a la secretaría del Centro de Investigaciones y Aplicaciones Nucleares (CIAN). El mismo formulario se utilizara tanto para solicitar el inicio, modificación, suspensión o reinicio del servicio. Dirigir la solicitud al Ingeniero Vladimir Polanco encargado del Laboratorio de Electrónica Nuclear del CIAN ubicado en la Facultad de Ingeniería y Arquitectura de la Universidad de El Salvador, Final Avenida Héroes y Mártires del 30 de julio, Ciudad Universitaria, San Salvador, El Salvador. Se podrá enviar en adelanto copia de dicha solicitud a través de fax al 2235-9035 o al correo electrónico <a href="mailto:servicioscianfia@gmail.com">servicioscianfia@gmail.com</a></li>
        <li>El equipo a ser evaluado debe estar en óptimas condiciones de operación en caso contrario el cliente debe notificar que su equipo se encuentra dañado o en mantenimiento para que el control de calidad sea reprogramado.</li>
        <li>El equipo a ser evaluado debe estar instalado en una sala con las barreras adecuadas, sala de control cubierta con una barrera adecuada, debe poseer todas las puertas blindadas, para realizar el control de calidad en condiciones óptimas de seguridad,<strong> no se evaluarán equipos al aire libre en pasillos expuestos a tránsito humano, ni en instalaciones con barreras de protección incompletas</strong>.</li>
        <li>El cliente proporcionará película radiográfica 8x10 (pulgadas), y los medios para revelarla, es decir procesadora de películas y químicos de revelado en buenas condiciones, en caso de no poseer película 8x10 el cliente podrá cortar película de mayor tamaño para obtener la medida 8x10.</li>
        <li>El equipo a ser evaluado debe estar libre de atención a pacientes  por un periodo de mínimo de tiempo el cual se detalla en el siguiente cuadro:</li>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-primary">
                <th>
                    Tipo de Equipo / Servicio
                </th>
                <th>
                    Tiempo necesario (minimo)
                </th>
                </thead>
                <tbody>
                <tr>
                    <td>Convencional fijo</td>
                    <td>1 hora</td>
                </tr>
                <tr>
                    <td>Convencional movil</td>
                    <td>1 hora</td>
                </tr>
                <tr>
                    <td>Convencional con flouroscopía</td>
                    <td>2 horas</td>
                </tr>
                <tr>
                    <td>Brazo C</td>
                    <td>1:30 horas</td>
                </tr>
                <tr>
                    <td>Mamográfico </td>
                    <td>1:30 horas</td>
                </tr>
                <tr>
                    <td>Dental periapical</td>
                    <td>45 minutos</td>
                </tr>
                <tr>
                    <td>Dental Panorámico </td>
                    <td>1:30 horas</td>
                </tr>
                <tr>
                    <td>Tomografía Axial Computarizada</td>
                    <td>1:30 horas</td>
                </tr>
                </tbody>
            </table>
        </div>
        <li>El cliente debe proporcionar personal para la operación de los equipos, en las tareas siguientes: realización de los disparos con el equipo de RX, revelado de película, carga de película en casetas.</li>
        <li>Si el cliente no puede proporcionar alguna de las condiciones anteriormente mencionadas deberá ponerse en contacto con la oficina del CIAN y notificar que aún no está preparado para la visita, en este caso se reprogramará la visita cuando el cliente se comunique que cuenta con todas las condiciones para la realización del control de calidad.</li>
    </ul>

</div>

<br>
<a href="{{ url('/servicios/control-de-calidad/'.$apply->id.'/confirmar') }}" class="btn btn-primary">Confirmar Solicitud</a>
