<div class="form-group asociar-archivo">
    <hr>
    {{Form::select("procedimiento-$procedure_type-$file_type",
                    $procedures,
                    null,
                    ['id'=>"procedimiento-$procedure_type-$file_type",
                    'class'=>'form-control',
                    'style'=>"width: 100%",
                    'onchange'=>'changedata("procedimiento-'.$procedure_type.'-'.$file_type.'","archivo-'.$file_type.'-'.$procedure_type.'","'.$url.'")'])
    }}

    <hr>
    {{Form::select("archivo-$file_type-$procedure_type",
                   ['Seleccione Un Procedimiento'],
                   null,
                   ['id'=>"archivo-$file_type-$procedure_type",
                   'class'=> 'form-control',
                   'style'=>"width: 100%",
                   'multiple'])
   }}
    <hr>
    <a class="form-control btn-primary btn"
            onclick='asociar("{{$storeUrl}}","archivo-{{$file_type.'-'.$procedure_type}}")'>Asociar
    </a>
</div>