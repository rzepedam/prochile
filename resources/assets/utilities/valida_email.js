function validaEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return re.test(email);
}

$("#email").on('change', function () {
    if ( ! validaEmail($(this).val()) ) {
        toastr.error('Verifique que el email ha sido ingresado correctamente', 'Email Incorrecto');
        $(this).focus();
    }
});