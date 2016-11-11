<form action="/servicios/frotis-radiacion" method="post">
    {{csrf_field()}}
    <div class="panel panel-primary">
        <div class="panel-heading"><h3> Informacion del Cliente</h3></div>
        <div class="panel-body">
            <div class="form-group {{$errors->has('type_service') ? 'has-error': ''}} ">
                <label for="type_service" class="checkbox-inline"><input type="checkbox" name="frotis" value="1">Frotis</label>
                <label for="type_service" class="checkbox-inline"><input type="checkbox" name="radiation" value="1">Nivel de Radiación</label>
                @if ($errors->has('type_service'))
                    <span class="help-block"><strong>{{ $errors->first('type_service') }}</strong></span>
                @endif
            </div>
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
    <br>
    <button class="btn btn-primary">Guardar Solicitud</button>
</form>