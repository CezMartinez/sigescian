<form action="/servicios/control-calidad" method="post">
    {{csrf_field()}}
    <div class="panel panel-primary">
        <div class="panel-heading"><h3> Informacion del Cliente</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
                        <label for="name">Nombre o razón Social:</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Laboratorios Perez" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('customer_id') ? 'has-error': ''}} ">
                        <label for="customer_id">Institucion:</label>
                        {!! Form::select('customer_id',$types,null,['class' => 'form-control']) !!}
                        @if ($errors->has('customer_id'))
                            <span class="help-block"><strong>{{ $errors->first('customer_id') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group {{$errors->has('address') ? 'has-error': ''}} ">
                <label for="address">Direccion:</label>
                <textarea name="address" class="form-control" placeholder="Avenida Siempre Viva 742" required autofocus>{{old('address')}}</textarea>
                @if ($errors->has('address'))
                    <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('municipality') ? 'has-error': ''}} ">
                        <label for="municipality">Municipio:</label>
                        <input type="text" name="municipality" class="form-control" value="{{old('municipality')}}" placeholder="San Salvador" required autofocus>
                        @if ($errors->has('municipality'))
                            <span class="help-block"><strong>{{ $errors->first('municipality') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('department') ? 'has-error': ''}} ">
                        <label for="department">Departamento:</label>
                        <input type="text" name="department" class="form-control" value="{{old('department')}}" placeholder="San Salvador" required autofocus>
                        @if ($errors->has('department'))
                            <span class="help-block"><strong>{{ $errors->first('department') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('country') ? 'has-error': ''}} ">
                        <label for="country">Pais:</label>
                        <input type="text" name="country" class="form-control" value="{{old('country')}}" placeholder="El Salvador" required autofocus>
                        @if ($errors->has('country'))
                            <span class="help-block"><strong>{{ $errors->first('country') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('phone') ? 'has-error': ''}} ">
                        <label for="phone">Telefono:</label>
                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="2222-2222" required autofocus>
                        @if ($errors->has('phone'))
                            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('fax') ? 'has-error': ''}} ">
                        <label for="fax">Fax:</label>
                        <input type="fax" name="fax" class="form-control" value="{{old('fax')}}" placeholder="2222-2222" required autofocus>
                        @if ($errors->has('fax'))
                            <span class="help-block"><strong>{{ $errors->first('fax') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('email') ? 'has-error': ''}} ">
                        <label for="email">Correo Electronico:</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="cliente@cliente.com" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('responsable') ? 'has-error': ''}} ">
                        <label for="responsable">Responsable:</label>
                        <input type="text" name="responsable" class="form-control" value="{{old('responsable')}}" placeholder="Juan Perez" required autofocus>
                        @if ($errors->has('responsable'))
                            <span class="help-block"><strong>{{ $errors->first('responsable') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('position') ? 'has-error': ''}} ">
                        <label for="position">Cargo:</label>
                        <input type="position" name="position" class="form-control" value="{{old('position')}}" placeholder="Tecnico de Rayos X" required autofocus>
                        @if ($errors->has('position'))
                            <span class="help-block"><strong>{{ $errors->first('position') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{$errors->has('activity_id') ? 'has-error': ''}} ">
                        <label for="activity_id">Actividad:</label>
                        {!! Form::select('activity_id',$actividad,null,['class' => 'form-control']) !!}
                        @if ($errors->has('activity_id'))
                            <span class="help-block"><strong>{{ $errors->first('activity_id') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Personal de contacto para:</h3></div>
        <div class="panel-body">
            <p style="font-style: italic;"><strong>Confirmar Visita</strong></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{$errors->has('name_visit') ? 'has-error': ''}} ">
                        <label for="name_visit">Nombre:</label>
                        <input type="text" name="name_visit" class="form-control" value="{{old('name_visit')}}" placeholder="Juan Perez" required autofocus>
                        @if ($errors->has('name_visit'))
                            <span class="help-block"><strong>{{ $errors->first('name_visit') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{$errors->has('position_visit') ? 'has-error': ''}} ">
                        <label for="position_visit">Cargo:</label>
                        <input type="text" name="position_visit" class="form-control" value="{{old('position_visit')}}" placeholder="Recepcionista" required autofocus>
                        @if ($errors->has('position_visit'))
                            <span class="help-block"><strong>{{ $errors->first('position_visit') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{$errors->has('phone_visit') ? 'has-error': ''}} ">
                        <label for="phone_visit">Telefono</label>
                        <input type="text" name="phone_visit" class="form-control" value="{{old('phone_visit')}}" placeholder="2222-2222" required autofocus>
                        @if ($errors->has('phone_visit'))
                            <span class="help-block"><strong>{{ $errors->first('phone_visit') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            <p style="font-style: italic;"><strong>Tramites Administrativos</strong></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{$errors->has('name_admin') ? 'has-error': ''}} ">
                        <label for="name_admin">Nombre:</label>
                        <input type="text" name="name_admin" class="form-control" value="{{old('name_admin')}}" placeholder="Juan Perez" required autofocus>
                        @if ($errors->has('name_admin'))
                            <span class="help-block"><strong>{{ $errors->first('name_admin') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{$errors->has('position_admin') ? 'has-error': ''}} ">
                        <label for="position_admin">Cargo:</label>
                        <input type="text" name="position_admin" class="form-control" value="{{old('position_admin')}}" placeholder="Recepcionista" required autofocus>
                        @if ($errors->has('position_admin'))
                            <span class="help-block"><strong>{{ $errors->first('position_admin') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{$errors->has('phone_admin') ? 'has-error': ''}} ">
                        <label for="phone_admin">Telefono</label>
                        <input type="text" name="phone_admin" class="form-control" value="{{old('phone_admin')}}" placeholder="2222-2222" required autofocus>
                        @if ($errors->has('phone_admin'))
                            <span class="help-block"><strong>{{ $errors->first('phone_admin') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Total de Dosimetros Solicitados</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{$errors->has('pd') ? 'has-error': ''}} ">
                        <label for="pd" class="checkbox-inline"><input type="checkbox" name="pd" value="1">PD1</label>
                        <input type="number" name="pd_number" class="form-control" value="{{old('pd_number')}}" min="1" placeholder="1" required autofocus>
                        @if ($errors->has('pd'))
                            <span class="help-block"><strong>{{ $errors->first('pd') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{$errors->has('pd') ? 'has-error': ''}} ">
                        <label for="anillo" class="checkbox-inline"><input type="checkbox" name="anillo" value="1">Anillos</label>
                        <input type="number" name="anillo_number" class="form-control" value="{{old('anillo_number')}}" min="1" placeholder="1" required autofocus>
                        @if ($errors->has('pd'))
                            <span class="help-block"><strong>{{ $errors->first('pd') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </div>
    <br>
    <button class="btn btn-primary">Guardar Solicitud</button>
</form>