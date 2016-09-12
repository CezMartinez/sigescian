<form action="/laboratorios" method="post">
    {{csrf_field()}}
    <!-- name Form Input -->
    <div class="form-group {{$errors->has('name') ? 'has-error':''}}">         
    <label for="name" class="control-label">Nombre:</label>         
        <input type="text" name="name" class="form-control">         
        @if ($errors->has('name'))             
            <span class="help-block">                 
                <strong>{{ $errors->first('name') }}</strong>             
            </span>         
        @endif     
    </div>

        <div class="form-group {{$errors->has('description') ? 'has-error':''}}">
            <label class="control-label" for="description">Descripcion:</label>
            <textarea type="text" name="description" class="form-control" value="{{old('description')}}">
            </textarea>
            @if ($errors->has('description'))             
            <span class="help-block">                 
                <strong>{{ $errors->first('description') }}</strong>             
            </span>         
        @endif     
        </div>

        <button class="btn btn-primary">Agregar Laboratorio</button>
</form>
