/**
 * Desarrollo web en Entorno Servidor
 * curso 2024|25
 * 
 * @author Antonio J. Sánchez
 */


$(document).ready(function() {

    
    /**
     * Invocamos la función cada vez que quedamos cargar un
     * nuevo bloque de películas y añadirlas al listado. O 
     * sea, que estamos paginando como quien dice...
     * @param pagina
     */
    function cargarPaginaPeliculas(pagina) {
        $.ajax({
            url     : "./libs/ajax_listar.php",     // método que procesa la información
            method  : "get",                        // protocolo (get, post)
            dataType: "html",                       // tipo de resultado esperado
            data    : { pagina: pagina }            // parámetros que pasamos a la url
        }).done(data => {
            $("#capa").append(data) ;
        }) ;
    }
    
     // ########################################################################
    // paginación con AJAX
    $(window).on("scroll", () => {
        
        // altura del contenido del documento HTML 
        let alturaDocumento = $(document).height() ;

        // altura de la ventana del navegador
        let alturaVentana   = $(window).height() ;

        // me indica en qué posición se encuentra la barra 
        // de desplazamiento de la ventana del navegador
        let posicion = $(window).scrollTop() ;

        // comprobamos si hemos llegado al final de la ventana
        if(posicion + alturaVentana >= alturaDocumento) {

            // recupero el número de página
            let pagina = parseInt(localStorage.getItem("pagina")) + 1 ;
            let total  = parseInt(localStorage.getItem("total")) ;

            if (pagina <= total) {                 
                
                // cargamos el listado de películas de la página
                // indicada 
                cargarPaginaPeliculas(pagina) ; 

                // actualizamos el número de página
                localStorage.setItem("pagina", pagina) ;
            }
        }
    }) ;


    // cargamos la primera página
    cargarPaginaPeliculas(1) ;

    
    // ########################################################################
    // cuando se selecciona una puntuación enviamos el formulario
    $(".estrellas input").on("change", () => { $("#estrellas").submit() ; }) ;




    // ########################################################################
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