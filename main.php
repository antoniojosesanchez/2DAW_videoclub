<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez    
     */

    session_start() ;    
    
    if ((empty($_SESSION)) || 
        (time() >= $_SESSION["_tiempo"])):            
            $_SESSION = [] ;
            die(header("location: http://localhost:8080/2DAW_videoclub/")) ;
    endif ;
    
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
       <?php require_once "./libs/menu.php" ; ?>

       <!-- 
            mostramos listado de las películas que pertenecen a las plataformas
            a las que está sucrito el usuario.
        -->

        <?php 

            try {
                $pdo = new PDO("mysql:host=db;dbname=mibd;charset=utf8mb4", "root", "") ;
            } catch(PDOException $exception) {
                die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>") ;
            }
        
            # buscamos las películas asociadas a las plataformas a las que está
            # suscrito el usuario. Creamos una plantilla.
            $sql = "SELECT pelicula.*, plataforma.* FROM pelicula
                    JOIN plataforma_pelicula PP ON (pelicula.idPel = PP.idPel)
                    JOIN plataforma ON (PP.idPla = plataforma.idPla)
                    JOIN plataforma_usuario PU ON (plataforma.idPla = PU.idPla)
                    JOIN usuario ON (PU.idUsu = usuario.idUsu)
                    WHERE usuario.email = :email ;" ;
            
            # preparamos la consulta (PDOStatement)
            $sqlp = $pdo->prepare($sql) ;

            # vincular los valores con las etiquetas

            # VINCULACIÓN DE VALORES
            $sqlp->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR) ;

            # VINCULACIÓN DE PARÁMETROS
            #$sqlp->bindParam(":email", $usuario->getEmail(), PDO::PARAM_STR, 100) ;

            # lanzar la consulta
            $sqlp->execute() ;


            while($objeto = $sqlp->fetchObject()):
        ?>

                <div class="card shadow-sm p-4 m-2">
                    <div class="card-title"><h4><?= $objeto->titulo ?></h4></div>                    
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm">⭐⭐⭐⭐✰</div>                            
                        </div>

                        <div class="row">
                            <div class="col-sm-2">Plataforma: </div>
                            <div class="col-sm"><?= $objeto->nombre ?></div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-sm btn-primary">Ver información</button>
                            </div>
                        </div>

                    </div>
                </div>
                


        <?php
            endwhile ;

            # cerramos la conexión con el servidor de bases de datos
            $pdo = null ;
        ?>
            


    </div>
</body>
</html>