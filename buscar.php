<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    session_start() ;
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

</head>
<body>

    <div class="container">
        <?php

            require_once "./clases/Usuario.php" ;
            
            $usuario = unserialize($_SESSION["_usuario"]) ;

            echo "<pre>".print_r($_SESSION, true)."</pre>" ;
        ?>

        <h2>Bienvenido/a, <?= $usuario ?></h2>
        <a href="logout.php">Cerrar sesion</a>

        <form class="mt-4">
            <input id="patron" type="text" name="patron" />
            <button type="button" id="enviar">Buscar</button>
        </form>

        <div id="capa"></div>

    </div>
    
</body>
</html>