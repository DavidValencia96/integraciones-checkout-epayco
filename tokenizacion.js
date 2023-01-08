$(document).ready(function () {

    // Autenticación con su public_key (Requerido)
    ePayco.setPublicKey('d42ae82ca25bd9b0f3877a574183c4d7');

    $('#customer-form').on('submit',function(event) {
        event.preventDefault();
        //captura el contenido del formulario
        var $form = $(this);
        //deshabilita el botón para no acumular peticiones
        $form.find("button").prop("disabled", true);
        //hace el llamado al servicio de tokenización
        ePayco.token.create($form, function(error, token) {
            //habilita el botón al obtener una respuesta
            $form.find("button").prop("disabled", false);
            if(!error) {
                //si la petición es correcta agrega un input "hidden" con el token como valor
                // $form.append($("<input type="hidden" name="epaycoToken">").val(token));
                console.log("Este es el token::", token);
                alert( "Este es el token::" + token);
                //envia el formulario para que sea procesado
                $form.get(0).submit();
            } else {
                //muestra errores que hayan sucedido en la transacción
                $('.customer-errors').text(error.data.description);
                console.log($(error.data.description));
            }
        });
        event.preventDefault();
    });

});