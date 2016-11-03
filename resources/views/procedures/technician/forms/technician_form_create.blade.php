<form action="/procedimientos/tecnicos" method="POST">

    <div class="row">
        <div class="col-md-6">
            @include('procedures.technician.forms.procedure_inputs')
            <button class="btn btn-primary">Guardar Procedimiento</button>
        </div>
        <div class="col-md-6">
            @include('procedures.technician.forms.technical_instructions')
        </div>
    </div>
</form>

@section('scripts')
    <script>
        $('#subsection').select2();
        $("#subsection").select2({placeholder: "Seleccione subsecciones"});
    </script>
    <script>
        function changedata()
        {
            var section = $('#section').val();
            var subsection = $('#subsection');
            var option = $('#subsection').children().attr('class', 'optionsubseccion');
            if (section == 4 || section == 5) {
                subsection.removeAttr('disabled', false)
                subsection.removeAttr('readonly', false)
                $.getJSON("/subsecciones/" + section, function (result)
                {
                    $('#subsection').find('option').remove().end()
                    $.each(result, function (key, value)
                    {
                        $('#subsection').append($('<option>').text(value).attr('value', key));
                    });
                });
            } else {
                $('#subsection').find('option').remove().end()
                subsection.attr('disabled', true)
                subsection.attr('readonly', true)
            }
        }
    </script>
    <script src="/js/technical_instructions.js"></script>
@endsection