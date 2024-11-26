<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     * SELECT * FROM pelicula P JOIN plataforma_pelicula PP ON (P.idPel = PP.idPel) JOIN plataforma_usuario PU ON (PP.idPla = PU.idPla) JOIN usuario U ON (PU.idUsu = U.idUsu) WHERE U.email = "vazema3@wisc.edu" ;

     */

    session_start() ;    
    
    if ((empty($_SESSION)) || 
        (time() >= $_SESSION["_tiempo"]))             
            die(header("location: http://localhost:8080/2DAW_videoclub/")) ;
    
    # actualizamos el tiempo de sesion
    $_SESSION["_tiempo"] = time() + 300;
    
    # definimos el token (evita ataques csrf)
    $_SESSION["_token"] = md5(time()) ;
     
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador Videoclub</title>

    <link href="./assets/css/videoclub.css" rel="stylesheet" />

    <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/videoclub.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <style>
        .profile { border-radius: 50%; width: 64px;}
    </style>

</head>
<body>

    <div class="container">
        <?php

            require_once "./clases/Usuario.php" ;
            
            $usuario = unserialize($_SESSION["_usuario"]) ;

           // echo "<pre>".print_r($usuario, true)."</pre>" ;
        ?>        
    

       <?php require_once "./libs/menu.php" ; ?>

        <form class="mt-4">
            <input id="patron" type="text" name="patron" />
            <button type="button" id="enviar">Buscar</button>
        </form>

        <div id="capa"></div>

    </div>
    
</body>
</html>