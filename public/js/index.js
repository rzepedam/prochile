$(document).ready(function () {
    $('.btn-delete').on('click', function () {

        var url   = $(this).attr('data-url');
        var id    = $(this).attr('data-id');
        var token = $(this).attr('data-token');
        var row   = $(this).parents('tr');

        swal({
            title: "Eliminar registro?",
            text: "Si confirma, eliminará por completo este registro.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        }, function(){
            $.ajax({
                type: 'DELETE',
                data: {'id': $(this).attr('data-id'), '_token': token},
                url: '/' + url + '/' + id,
                success: function (response) {
                    if (response.status) {
                        row.fadeOut(1000);
                        setTimeout(function () {
                            row.delay(1000).remove();
                        }, 1000);
                        sweetAlert("Yeah!", "La operación fue realizada satisfactoriamente!", "success");
                    } else {
                        sweetAlert("Oops...", "Ha ocurrido un error. No es posible conectar con el servidor!", "error");
                    }
                },
            });
        });
    });
});