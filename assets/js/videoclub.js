/**
 * Desarrollo web en Entorno Servidor
 * curso 2024|25
 * 
 * @author Antonio J. Sánchez
 */


$(document).ready(function() {


    // cuando se selecciona una puntuación enviamos el formulario
    $(".estrellas input").on("change", () => { $("#estrellas").submit() ; }) ;

    // solicitud AJAX para el buscador
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