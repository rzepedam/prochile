$("input#rut").rut().on('rutInvalido', function () {
    toastr.error('Verifique que el rut ha sido ingresado correctamente', 'Rut Incorrecto', {
        "closeButton": true,
        "progressBar": true,
        "timeOut": "2000"
    });
    $(this).focus();
});