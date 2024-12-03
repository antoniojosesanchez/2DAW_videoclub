<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */
    
    session_start() ;

    # hacemos un logout

    # 1. eliminamos la información de la sesión
    $_SESSION = [] ;

    # 2. destruimos la sesión
    session_destroy() ;

    # 3. redirigimos al usuario a la página de login
    header("location: http://localhost:8080/2DAW_videoclub") ;