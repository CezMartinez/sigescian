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
<div class="panel-heading"><h3>Personal de contacto para:</h3></div>
<div class="panel-body">
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
<div class="panel-heading"><h3>Total de Dosimetros Solicitados</h3></div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-3">
            <p style="font-style: italic;"><strong>PD1: </strong></p>
            <p><strong>Cantidad: </strong>
                @if($apply->pd_number==null)
                    No fueron solicitados
                @else
                    {{$apply->pd_number}}
                @endif</p>
        </div>
        <div class="col-md-3">
            <p style="font-style: italic;"><strong>Anillos: </strong></p>
            <p><strong>Cantidad: </strong>
                @if($apply->anillo_number==null)
                    No fueron solicitados
                @else
                    {{$apply->anillo_number}}
                @endif</p>
        </div>
    </div>
</div>
<hr>
<div class="panel-heading"><h3> Definicion del Servicio</h3></div>
<div class="panel-body">
    <p>El servicio de dosimetría personal externa es un servicio integral mediante el cual se monitorea la dosis de radiación que recibe en forma individual el personal que por motivo de su trabajo está expuesto a las radiaciones ionizantes. Dicho servicio comprende lo siguiente:</p>
    <ul>
        <li>Arrendamiento  de  dosímetros  PD1   y/o  de  anillo  para  medición de dosis recibida por radiación externa de fotones (R-X y Gamma) durante el periodo de control</li>
        <li>Cambio del dosímetro al término de cada periodo de control</li>
        <li>Lectura de dosímetro al finalizar el periodo de control</li>
        <li>Envío de informe de  la dosis recibida en el periodo de control en unidades de mili Sievert [mSv ]</li>
        <li>Incorporación de  la dosis recibida por cada usuario al  banco de datos del Laboratorio TLD</li>
        <li>Entrega del historial dosimétrico de cada usuario cuando sea solicitado por la empresa</li>
    </ul>
    <br>
</div>
<div class="panel-heading"><h3>Especificaciones de dosímetros</h3></div>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary">
            <th>
                TIPO DE DOSIMETRO
            </th>
            <th>
                APLICACION DOSIMETRICA
            </th>
            <th>
                RANGO DE DOSIS (Dosis absorbida)
            </th>
            </thead>
            <tbody>
            <tr>
                <td>PD1    (TLD-100 ; LiF:Mg. Ti)</td>
                <td>GAMMA, R-X (Industria, medicina)</td>
                <td>10 µGy - 10 Gy</td>
            </tr>
            <tr>
                <td>Anillo (TLD-100 ; LiF:Mg. Ti)</td>
                <td>GAMMA, R-X, BETA (Industria, medicina)</td>
                <td>10 µGy - 10 Gy</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="panel-heading"><h3>CONDICIONES PARA LA PRESTACION DEL SERVICIO DE DOSIMETRIA </h3></div>
<div class="panel-body">
    <ul>
        <li>Se deberá llenar el formulario de solicitud de servicio de dosimetría proporcionado por el Laboratorio de Dosimetría Personal Externa TLD con la información requerida, Y presentar el documento en original a la secretaria del Centro de Investigaciones y Aplicaciones Nucleares (CIAN). El mismo formulario se utilizara tanto para solicitar el inicio, modificación, suspensión o reinicio del servicio. Dirigir la solicitud al Ingeniero Héctor Alfonso Chávez encargado del Laboratorio de Dosimetría Personal Externa TLD del CIAN ubicado en la Facultad de Ingeniería y Arquitectura de la Universidad de El Salvador, Final Avenida Héroes y Mártires del 30 de julio, Ciudad Universitaria, San Salvador, El Salvador. Se podrá enviar en adelanto copia de dicha solicitud a través de fax al 2235-9035 o al correo electrónico <a href="mailto:servicioscianfia@gmail.com">servicioscianfia@gmail.com</a></li>
        <li>El Laboratorio de Dosimetría Externa TLD iniciara el servicio dosimétrico una vez se haya revisado y aprobado técnicamente la solicitud presentada, lo que será comunicado oportunamente al cliente por el mismo Laboratorio.</li>
        <li>El periodo de control dosimétrico puede ser mensual o bimestral, solarmente en casos especiales y a decisión del Laboratorio de Dosimetría se podrá programar trimestral</li>
        <li>Todo Servicio de Dosimetría Personal se prestara por un periodo no menor de 6 meses. Los cuales serán cancelados en plazos previamente establecidos con el cliente. No excediendo dicho plazo Los 6 meses iniciales</li>
        <li>El servicio de Dosimetría Personal tendrá el <strong>costo mensual</strong> por tipo de dosímetro utilizado como se detalla a continuación:</li>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-primary">
                <th>
                    Tipo de dosímetro
                </th>
                <th>
                    Valor mensual por dosímetro (Hasta 9 usuarios)
                </th>
                <th>
                    Valor mensual por dosímetro (10 o más usuarios)
                </th>
                </thead>
                <tbody>
                <tr>
                    <td>PD1</td>
                    <td>$7.43</td>
                    <td>$6.29</td>
                </tr>
                <tr>
                    <td>Anillo</td>
                    <td>$7.43</td>
                    <td>$6.29</td>
                </tr>
                </tbody>
            </table>
        </div>
        <li>La facturación y su cancelación será por anticipado y podrá ser en efectivo o con <strong>cheque certificado</strong> a nombre de <strong>Universidad de El Salvador, Facultad de Ingeniería y Arquitectura</strong> (o <strong>FIA</strong>), Los periodos de pago se pactaran con la empresa solicitante y pueden ser diferentes de los periodos de control</li>
        <li>Los dosímetros son propiedad del Laboratorio de Dosimetría Personal y su pérdida o daño irreparable implicará el pago de su valor equivalente a $<strong>45.00</strong> US dólares</li>
        <li>La entrega inicial y los posteriores recambios de los dosímetros se hará en las  instalaciones de la secretaría del  CIAN. Para ello el CIAN se coordinara con el encargado de parte de la empresa contratantepara realizar las entregas correspondientes de dosímetros en las fechas programadas. Para todo efecto, se considerara como fin de cada periodo la fecha de devolución definida en la nota de envío de los dosímetros del periodo correspondiente</li>
        <li>La empresa contratante tiene la obligación de cumplir con la fecha de recambio anteriormente señalada ya que esto es importante para la eficacia del monitoreo</li>
        <li>Debido a la  técnica utilizada en el Laboratorio de Dosimetría se permitirá un periodo de control de tres meses como máximo. Si por alguna razón se sobrepasan los tres meses, independiente del periodo de control contratado, no se realizará lectura de los dosímetros ya que la fiabilidad de las lecturas no se respalda. Y por lo tanto se emitirá informe sin lecturas con una observación en tal sentido.</li>
        <li>Esto último no implica que se dejara de pagar los meses adicionales que los dosímetros estuvieron en posesión del usuario, por lo que la empresa contratante está en la obligación de cancelar dichos meses.</li>
        <li>El laboratorio de Dosimetría personal  no enviara dosímetros de reposición si a la fecha de recambio no han sido devueltos los dosímetros usados en el periodo anterior</li>
        <li>Todo aumento o disminución de usuarios respecto al inicialmente establecido, deberá ser comunicado por escrito al laboratorio con lo menos 15 días de antelación al termino del periodo en curso, En caso de aumento, el Laboratorio de dosimetría informara a la empresa contratante la fecha en que se hará entrega de los dosímetros adicionales.</li>
        <li>El pago por el servicio a usuarios adicionales al que se refiere el numeral anterior será cancelado en el plaza establecido para los usuarios iniciales.</li>
        <li>El Servicio de Dosimetría Personal será suspendido total o parcialmente por el no pago de una factura dentro de los plazos establecidos o por mal uso reiterado de los dosímetros que implique perdida o daños irreparables.</li>
        <li>La finalización o suspensión total de Servicio de Dosimetría Personal, decidida por el cliente deberá ser comunicada con una antelación mínima de 30 días. Sin menoscabo de lo establecido en el numeral cuatro.</li>
        <li>La empresa contratante puede suspender temporalmente el servicio cuando por circunstancias especiales considere que es procedente. Para ello deberá estar solvente de cualquier pago e informar al Laboratorio de dosimetría por escrito con al menos 15 días de anticipación a la fecha que vence el periodo de control en curso. Además deberá entregar los dosímetros a más tardar cinco días hábiles después de la fecha de devolución. De lo contrario se seguirá cargando el costo mensual del servicio mientras los dosímetros estén en su poder.</li>
    </ul>

</div>

<br>
<a href="{{ url('/servicios/dosimetria-personal-externa/'.$apply->id.'/confirmar') }}" class="btn btn-primary">Confirmar Solicitud</a>
