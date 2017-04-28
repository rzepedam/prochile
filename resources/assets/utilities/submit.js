$('#btnSubmit').click(function (e) {

    e.preventDefault();

    var form   = $('#form-submit');
    var action = $('#form-submit').attr('action');
    var button = $(this);

    button.addClass('hide')
    $('#spinner').removeClass('hide');

    $.post(action,
        form.serialize(),
        function (response) {
            if (response.status) {
                window.location.href = response.url;
            } else {
                button.removeClass('hide')
                $('#spinner').addClass('hide');
                sweetAlert("Oops...", "Ha ocurrido un error. No es posible conectar con el servidor!", "error");
            }
        }).fail(function (response) {
            button.removeClass('hide')
            $('#spinner').addClass('hide');
            var errors = $.parseJSON(response.responseText);
            $.each(errors, function (index, value) {
                $('#js').html('<i class="fa fa-times"></i> ' + value).removeClass('hide');
                $('#' + index).focus();
                return false;
            });
        }
    );
});
