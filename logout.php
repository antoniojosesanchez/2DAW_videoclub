<?php
    
    session_start() ;

    # hacemos un logout

    # 1. eliminamos la información de la sesión
    $_SESSION = [] ;

    # 2. destruimos la sesión
    session_destroy() ;

    # 3. redirigimos al usuario a la página de login
    header("location: http://localhost:8080/2DAW_videoclub") ;