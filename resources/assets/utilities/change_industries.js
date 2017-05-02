$(document).ready(function() {
    $('#city_id').on('change', function() {
        $.get('/loadIndustries',
            { id: $('#city_id').val() },
            function(response) {
                if (response.status) {
                    $('#industry_id').empty();
                    $.each(response.industries, function(key, element) {
                        $('#industry_id').append("<option value='" + key + "'>" + element + "</option>");
                    });
                } else {
                    sweetAlert("Oops...", "Ha ocurrido un error. No es posible conectar con el servidor!", "error");
                }

            }
        );
    });
});