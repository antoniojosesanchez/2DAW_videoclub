<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    session_start() ;

    require_once "./libs/datos_peliculas.php" ;    

    # recuperamos el patrón que se nos envía y lo ponemos en minúsculas
    $patron = strtolower($_GET["patron"]) ;

    # contendrá la salida del proceso
    $salida = "" ;

    # buscamos el patrón (nombre) en el array
    foreach($datos as $pelicula):

        #convertimos el título de cada película a minúsculas
        $titulo = strtolower($pelicula->titulo) ;

        # comprobamos si el título contiene el patrón
        if (str_contains($titulo,$patron)) $salida .= $pelicula ;
                
    endforeach ;

    # si no he encontrado el patrón en ninguna película...
    echo empty($salida)?"No hay películas que se ajusten al criterio":$salida ;