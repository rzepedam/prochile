$("input#rut").rut().on('rutInvalido', function () {
    toastr.error('Verifique que el rut ha sido ingresado correctamente', 'Rut Incorrecto');
    $(this).focus();
});