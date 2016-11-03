<div class="panel panel-default " id="instructions" style="max-height: 420px;overflow-y: scroll;">

    <div class="panel-body ">
        <h4>Instrucciones tecnicas</h4>
        <div class="form-group {{$errors->has('instructions') ? 'has-error': ''}}">
            @if ($errors->has('instructions'))
                <span class="help-block">
                        <strong>{{ $errors->first('instructions') }}</strong>
                    </span>
            @endif
        </div>
        <hr>
        <ol id="pasos">

        </ol>

        <div class="row" style="margin-top: 1em">
            <div class="col-md-6 col-lg-offset-3">
                <a class="btn btn-block btn-success" onclick="agregar()">
                    <span class="glyphicon glyphicon-plus"></span>
                    Agregar
                </a>
            </div>
        </div>
    </div>
</div>
