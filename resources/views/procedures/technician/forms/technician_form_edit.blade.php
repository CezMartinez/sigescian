<div class="row">
    <form action="/procedimientos/tecnicos/{{$procedure->id}}" method="POST">
        <div class="col-md-6">
            {{method_field('PUT')}}
            {{csrf_field()}}

                    <!-- name Form Input -->
            <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
                <label for="name" class="control-label">Nombre del Procedimiento:</label>
                <input type="text" name="name" class="form-control"
                       value="{{old('name',str_replace($procedure->prefix,'',$procedure->name))}}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                @endif
            </div>

            <!-- acronym Form Input -->
            <div class="form-group {{$errors->has('acronym') ? 'has-error': ''}}">
                <label for="acronym" class="control-label">Acrónimo del Procedimiento:</label>
                <input type="text" name="acronym" class="form-control" value="{{old('acronym',$procedure->acronym)}} " required>
                @if ($errors->has('acronym'))
                    <span class="help-block">
                    <strong>{{ $errors->first('acronym') }}</strong>
                </span>
                @endif
            </div>
        {{-- section --}}
        <div class="form-group {{$errors->has('section') ? 'has-error': ''}}">
            <label for="section" class="control-label">Seccion:</label>
            {{Form::select('section',$sections,null,['id'=>'section','class'=>'form-control','onchange'=>'changedata()'])}}
            @if ($errors->has('section'))
                <span class="help-block">
                    <strong>{{ $errors->first('section') }}</strong>
                </span>
            @endif
        </div>
        {{-- subsection --}}
        <div class="form-group {{$errors->has('subsection') ? 'has-error': ''}}">
            <label for="subsection" class="control-label">Subseccion:</label>
            {{Form::select('subsection[]',['Seleccione una Seccion'],null,['id'=>'subsection','class'=>'form-control','disabled','readonly','multiple'])}}
            @if ($errors->has('subsection'))
                <span class="help-block">
                    <strong>{{ $errors->first('subsection') }}</strong>
                </span>
            @endif
        </div>

                <!-- file Form Input -->
                <div class="form-group {{$errors->has('file') ? 'has-error': ''}}">
                    <label for="file" class="control-label">Archivo del Procedimiento:</label>
                    <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx" value="{{old('file')}}" required>
                    @if ($errors->has('file'))
                        <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
                    @endif
                </div>

        <div class="form-group {{$errors->has('state') ? 'has-error': ''}} ">
            <label for="state" class="control-label">Estado: </label>
            {{Form::checkbox('state',null,$procedure->state)}}
        </div>


            <button class="btn btn-primary">Editar Procedimiento</button>
        </div>
        <div class="col-md-6">
            @include('procedures.technician.forms.technical_instructions')
        </div>
    </form>
</div>
