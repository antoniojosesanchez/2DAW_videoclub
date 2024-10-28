<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    session_start() ;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador Videoclub</title>

    <link href="./assets/css/videoclub.css" rel="stylesheet" />

    <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/videoclub.js"></script>

</head>
<body>

    <?php

        require_once "./clases/Usuario.php" ;
        
        $usuario = unserialize($_SESSION["_usuario"]) ;

        echo "<pre>".print_r($usuario, true)."</pre>" ;
    ?>

    <form>
        <input id="patron" type="text" name="patron" />
        <button type="button" id="enviar">Buscar</button>
    </form>

    <div id="capa"></div>
    
</body>
</html>