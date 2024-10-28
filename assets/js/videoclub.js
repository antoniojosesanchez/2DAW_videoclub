/**
 * Desarrollo web en Entorno Servidor
 * curso 2024|25
 * 
 * @author Antonio J. Sánchez
 */

// Solicitud AJAX para el buscador
$(document).ready(function() {

    $("#enviar").on("click", () => {

        // recuperamos el valor del campo input
        var cadena = $("#patron").val() ;

        // realizamos la llamada AJAX
        $.ajax({
            url     : "procesar.php",
            method  : "get",
            dataType: "html",
            data    : { patron: cadena }

        }).done((data) => { $("#capa").html(data) }) ;

    }) ;
}) ;