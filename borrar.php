<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    require_once "./clases/Usuario.php" ;    
    
    session_start() ;
    $usuario = unserialize($_SESSION["_usuario"]) ;

    # evitamos un ataque CSRF 
    if ($_SESSION["_token"]!=$_GET["token"]):
        die("ERROR...") ;
    endif ;

    $_SESSION["_token"] = md5(time()) ;
    echo "<pre>".print_r($_SESSION, true)."</pre>" ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <div class="container">

        <h2>Bienvenido/a, <?= $usuario ?></h2>
        <h4>Se ha borrado la película con ID <?= $_GET["id"] ?></h4>

        <?php
            //$_SESSION["_borrado"] = "Se ha borrado la película con id {$_GET["id"]}" ;
        ?>

    </div>
</body>
</html>